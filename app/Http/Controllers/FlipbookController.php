<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Cviebrock\EloquentSluggable\Services\SlugService;

class FlipbookController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Upload::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('upload.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> edit</a>
                        <a href="' . route('upload.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.a.pages.upload.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Kategori::all();
        $select = [];
        foreach ($departments as $department) {
            $select[$department->kategori_kelas] = $department->kategori_kelas . $department->nama_guru . $department->judul;
        }
        return view('back.a.pages.upload.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $validated = $request->validate([
                'photo' => 'image|max:12048',
                'name' => 'required',
            ]);
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->store('upload');
            $slug = $request->title;
            $fileName = time() . '.' . $request->file->extension();

            $data = [
                'name' => $request->name,
                'judul' => $request->judul,
                'id_kategori' => $request->id_kategori,
                'path_pdf' => $fileName,
                'status' => $request->status,
                // 'slug' => SlugService::createSlug(Upload::class, 'slug', $request->title),
            ];
        } else {
            $validated = $request->validate([
                'name' => 'required',
                'path_pdf' => 'required|mimes:pdf,xlx,csv|max:2048',
            ]);
            $fileName = time() . '.' . $request->path_pdf->extension();
            $request->path_pdf->storeAs(('uploads'), $fileName);
            $slug = $request->title;
            $data = [
                'name' => $request->name,
                'judul' => $request->judul,
                'id_kategori' => $request->id_kategori,
                'path_pdf' => $fileName,
                'status' => $request->status,
                // 'slug' => SlugService::createSlug(Upload::class, 'slug', $request->title),
            ];
        }
        Upload::create($data);
        return redirect(route('upload.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Kategori::all();
        $select = [];
        $data = Upload::find($id);
        foreach ($departments as $department) {
            $select[$department->kategori_kelas] = $department->kategori_kelas . $department->nama_guru . $department->judul;
        }
        return view('back.a.pages.upload.edit', compact('data', 'select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('path_pdf')) {
            $validated = $request->validate([
                'name' => 'required',
            ]);
            $fileName = time() . '.' . $request->path_pdf->extension();
            $request->path_pdf->storeAs(('uploads'), $fileName);

            $upload = Upload::where('id', $id)->first();
            if (Storage::exists('uploads/' . $upload->path_pdf)) {
                Storage::delete('uploads/' . $upload->path_pdf);
                // unlink($upload->path_pdf);
            }

            $data = [
                'name' => $request->name,
                'judul' => $request->judul,
                'id_kategori' => $request->id_kategori,
                'path_pdf' => $fileName,
                'status' => $request->status,
                // 'slug' => SlugService::createSlug(Upload::class, 'slug', $request->title),
            ];
        } else {
            $validated = $request->validate([
                'name' => 'required',
                'judul' => 'required',
            ]);

            $data = [
                'name' => $request->name,
                'judul' => $request->judul,
                'id_kategori' => $request->id_kategori,
                'status' => $request->status,
                // 'slug' => SlugService::createSlug(Upload::class, 'slug', $request->title),
            ];
        }
        Upload::find($id)->update($data);
        return redirect(route('upload.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload = Upload::where('id', $id)->first();
        if (Storage::exists('uploads/' . $upload->path_pdf)) {
            Storage::delete('uploads/' . $upload->path_pdf);
            // unlink($upload->path_pdf);
        }
        $data = Upload::find($id);
        // $file_path = public_path().'/public/uploads/'.$data->path_pdf;
        return $data->delete();
    }

    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('uploads')->select('id', 'menu_name')->where('menu_name', 'LIKE', '%' . $cari . '%')->get();
        } else {
            $data = Upload::orderBy('id', 'ASC')->limit(10)->get();
        }
        return response()->json($data);
    }
}