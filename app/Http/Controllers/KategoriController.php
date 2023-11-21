<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kategori::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('kategori.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> edit</a>
                        <a href="' . route('kategori.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.a.pages.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = DB::table('kelas')->get();
        $select = [];
        foreach($departments as $department){
            $select[$department->kelas] = 'Kelas '.$department->kelas;
        }
        // return view('back.a.pages.upload.create', compact('select'));
        $root = Kategori::pluck('kategori_kelas', 'id');
        return view('back.a.pages.kategori.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate(
        //     [
        //         'kelas' => 'required',
        //     ],
        // );
        Kategori::create($request->except('_token') + [
            'menu_url' => Str::slug($request->kategori_kelas)
        ]);
        return redirect(route('kategori.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $Kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kategori::find($id);
        // $root = Kategori::pluck('kategori_kelas', 'id');
        $departments = DB::table('kelas')->get();
        $select = [];
        foreach($departments as $department){
            $select[$department->kelas] = 'Kelas '.$department->kelas;
        }
        return view('back.a.pages.kategori.edit', compact('data', 'select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Kategori::find($id)->update(
            $request->except(['_token']),
        );
        return redirect(route('kategori.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kategori::destroy($id);
        return $data;
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Kategori::class, 'file_url', $request->kategori);
        return response()->json(['slug' => $slug]);
    }

    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('kategories')->select('id', 'kategori_kelas')->where('kategori_kelas', 'LIKE', '%' . $cari . '%')->get();
        } else {
            $data = Kategori::orderBy('id', 'ASC')->limit(10)->get();
        }
        return response()->json($data);
    }
}
