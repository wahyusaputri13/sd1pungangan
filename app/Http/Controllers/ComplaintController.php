<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Complaint;
use App\Models\LogComplaint;
use App\Models\User;
use App\Models\Tusi;
// use PhpOffice\PhpWord\TemplateProcessor as TemplateProcessor;
// use App\Http\Controllers\TemplateProcessor as TemplateProcessor;
use Illuminate\Http\Request;
use Novay\WordTemplate\Facade as WordTemplate;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Http;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Complaint::orderBy('date', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        if ($data->status == 'open') {
                            $actionBtn = '
                            <div class="list-icons d-flex justify-content-center text-center">
                            <a href="' . route('complaint.show', $data->id) . ' " class="btn btn-simple btn-success btn-icon"><i class="material-icons">info</i> Timeline</a>
                            <a href="' . route('complaint.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Disposition</a>
                            <a href="' . route('complaint.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
                            </div>';
                        } else if ($data->status == 'Being Processed') {
                            $actionBtn = '
                            <div class="list-icons d-flex justify-content-center text-center">
                            <a href="' . route('complaint.show', $data->id) . ' " class="btn btn-simple btn-success btn-icon"><i class="material-icons">info</i> Timeline</a>
                            <a href="' . route('complaint.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Report</a>
                            <a href="' . route('complaint.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
                            </div>';
                        } else {
                            $actionBtn = '
                            <div class="list-icons d-flex justify-content-center text-center">
                            <a href="' . route('complaint.show', $data->id) . ' " class="btn btn-simple btn-success btn-icon"><i class="material-icons">info</i> Timeline</a>
                            <a href="' . route('complaint.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
                            </div>';
                        }
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'tgl',
                    function ($data) {
                        $actionBtn = '<center>' .
                            \Carbon\Carbon::parse($data->date)->toFormattedDateString()
                            . '</center>';
                        return $actionBtn;
                    }
                )
                ->addColumn(
                    'statuz',
                    function ($data) {
                        if ($data->status == 'open') {
                            $actionBtn = '<span class="tag label label-success">Open</span>';
                        } else if ($data->status == 'Being Processed') {
                            $actionBtn = '<span class="tag label label-info">Processed</span>';
                        } else {
                            $actionBtn = '<span class="tag label label-danger">Close</span>';
                        }
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action', 'tgl', 'statuz'])
                ->make(true);
        }
        return view('back.a.pages.complaint.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.a.pages.complaint.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:12048',
            'date' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);
        $path = $request->file('photo')->store('public_complaints');
        $id = Complaint::create(request()->except('_method', '_token', 'photo') + [
            'user_id' => auth()->user()->id,
            'attachment' => $path
        ])->id;
        LogComplaint::create([
            'complaint_id' => $id,
            'user_id' => auth()->user()->id,
            'message' => 'Report Created'
        ]);
        return redirect(route('complaint.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = LogComplaint::where('complaint_id', $id)->with('report.report2')->get();
        return view('back.a.pages.complaint.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Complaint::find($id);
        $languages  = Bidang::all();
        $user  = User::where('id', '>', '2')->get();
        if ($data->assigned_to) {
            return view('back.a.pages.complaint.report', compact('data', 'languages', 'user'));
        } else {
            return view('back.a.pages.complaint.edit', compact('data', 'languages', 'user'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'description' => 'required',
        ]);
        Complaint::where('id', $request->zzz)->update([
            'status' => 'Being Processed',
            'bidang_id' => $request->language,
            'tusi_id' => $request->framework,
            'assigned_to' => $request->assigned_to
        ]);
        LogComplaint::create([
            'complaint_id' => $request->zzz,
            'user_id' => auth()->user()->id,
            'message' => 'Being Processed'
        ]);
        return redirect(route('complaint.index'))->with(['success' => 'Data update successfully!']);
    }

    public function finish(Request $request)
    {
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public_complaints');
        } else {
            $path = null;
        }
        Complaint::where('id', $request->zzz)->update([
            'status' => 'Closed',
            'result' => $request->result,
            'result_pic' => $path,
        ]);

        LogComplaint::create([
            'complaint_id' => $request->zzz,
            'user_id' => auth()->user()->id,
            'message' => 'Report Completed'
        ]);
        return redirect(route('complaint.index'))->with(['success' => 'Data update successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Complaint::find($id);
        return $data->delete();
    }

    public function getFrameworks(Request $request)
    {
        if ($request->languageId) {
            $frameworks = Tusi::where('bidang_id', $request->languageId)->get();
            $users = User::where('bidang_id', $request->languageId)->get();
            if ($frameworks) {
                return response()->json(['status' => 'success', 'data' => [$frameworks, $users]], 200);
            }
            return response()->json(['status' => 'failed', 'message' => 'No frameworks found'], 404);
        }
        return response()->json(['status' => 'failed', 'message' => 'Please select language'], 500);
    }

    public function report($id)
    {
        $log = LogComplaint::find($id);
        $data = Complaint::find($log->complaint_id);
        $petugas = User::find($data->assigned_to);
        $file = public_path('report.rtf');
        $bidang = Bidang::where('id', $data->bidang_id)->get();
        $tusi = Tusi::where('id', $data->tusi_id)->get();

        if ($bidang[0]->name == 'TRANTIB') {
            $dispo = '() SEKRETARIAT (*) TRANTIB () GAKDA';
        } else  if ($bidang[0]->name == 'GAKDA') {
            $dispo = '() SEKRETARIAT () TRANTIB (v) GAKDA';
        }

        $array = array(
            '$tanggal_lap' => date('d F Y', strtotime($data->date)),
            '$pelapor' => $data->name,
            '$phone_lap' => $data->phone,
            '$lokasi' => $data->location,
            '$deskripsi' => $data->description,
            '$nama_petugas' => $petugas->name,
            '$disposisi' => $dispo,
            '$tgl_report' => date('d F Y', strtotime($log->created_at)),
        );

        $nama_file = date('d F Y', strtotime($log->created_at)) . '_' . $bidang[0]->name . '_' . $tusi[0]->name . '.doc';

        return WordTemplate::export($file, $array, $nama_file);
    }

    public function phpword($id)
    {
        $log = LogComplaint::find($id);
        $data = Complaint::find($log->complaint_id);
        $petugas = User::find($data->assigned_to);
        $bidang = Bidang::where('id', $data->bidang_id)->get();
        $tusi = Tusi::where('id', $data->tusi_id)->get();
        $lampiran = storage_path('app/public/' . $data->result_pic);

        if ($bidang[0]->name == 'TRANTIB') {
            $dispo = '() SEKRETARIAT (v) TRANTIB () GAKDA';
        } else  if ($bidang[0]->name == 'GAKDA') {
            $dispo = '() SEKRETARIAT () TRANTIB (v) GAKDA';
        } else  if ($bidang[0]->name == 'SEKRETARIAT') {
            $dispo = '(v) SEKRETARIAT () TRANTIB () GAKDA';
        }

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(public_path('report.docx'));
        $templateProcessor->setValue('tanggal_lap', date('d F Y', strtotime($data->date)));
        $templateProcessor->setValue('pelapor', $data->name);
        $templateProcessor->setValue('phone_lap', $data->phone);
        $templateProcessor->setValue('lokasi', $data->location);
        $templateProcessor->setValue('deskripsi', $data->description);
        $templateProcessor->setValue('nama_petugas', $petugas->name);
        $templateProcessor->setValue('disposisi', $dispo);
        $templateProcessor->setValue('jabatan', $petugas->jabatan);
        $templateProcessor->setValue('nip', $petugas->nip);
        $templateProcessor->setValue('tgl_report', date('d F Y', strtotime($log->created_at)));
        $templateProcessor->setValue('jawaban', $data->result);
        $templateProcessor->setValue('isi_disposisi', 'Silahkan di tindak lanjut berdasarkan laporan diatas.');
        $templateProcessor->setImageValue('lampiran', [
            'path' => $lampiran,
            'width' => '400',
            'height' => '400'
        ]);

        $nama_file = date('d F Y', strtotime($log->created_at)) . '_' . $bidang[0]->name . '_' . $tusi[0]->name . '.docx';

        header("Content-Disposition: attachment; filename=" . $nama_file . "");
        $templateProcessor->saveAs('php://output');

        // Http::post('http://127.0.0.1:8001/send-message', [
        Http::post('http://10.0.1.21:8001/send-message', [
            'number' => '085643710007',
            'message' => 'From Network Administrator Plekentung',
        ]);
    }
}
