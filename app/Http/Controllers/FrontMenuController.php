<?php

namespace App\Http\Controllers;

use App\Models\FrontMenu;
use App\Models\FrontSubmenu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FrontMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FrontMenu::all()->skip(1);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('frontmenu.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> edit</a>
                        <a href="' . route('frontmenu.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.a.pages.frontmenu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $root = FrontMenu::pluck('menu_name', 'id');
        return view('back.a.pages.frontmenu.create', compact('root'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'menu_name' => 'required',
            ],
        );
        FrontMenu::create($request->except('_token') + [
            'menu_url' => Str::slug($request->menu_name)
        ]);
        return redirect(route('frontmenu.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function show(FrontMenu $frontMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FrontMenu::find($id);
        $root = FrontMenu::pluck('menu_name', 'id');
        return view('back.a.pages.frontmenu.edit', compact('data', 'root'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        FrontMenu::find($id)->update(
            $request->except(['_token']),
        );
        return redirect(route('frontmenu.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontMenu  $frontMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FrontMenu::destroy($id);
        return $data;
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(FrontMenu::class, 'menu_url', $request->menu);
        return response()->json(['slug' => $slug]);
    }

    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('front_menus')->select('id', 'menu_name')->where('menu_name', 'LIKE', '%' . $cari . '%')->get();
        } else {
            $data = FrontMenu::orderBy('id', 'ASC')->limit(10)->get();
        }
        return response()->json($data);
    }
}
