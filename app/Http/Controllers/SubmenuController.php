<?php

namespace App\Http\Controllers;

use App\Models\Submenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Submenu::with(['menu']);
            return DataTables::of($data)
                // ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('submenu.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> edit</a>
                        <a href="' . route('submenu.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> delete</a>
                    </div>';
                        return $actionBtn;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('back.a.pages.submenu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu = Menu::orderBy('menu', 'asc')->pluck('menu', 'id');
        return view('back.a.pages.submenu.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $centang = ($request->input('is_active')) ? 1 : 0;
        $validated = $request->validate(
            [
                'menu_id' => 'required',
                'title' => 'required',
                'url' => 'required',
                'icon' => 'required',
            ],
        );
        Submenu::create($validated + ['is_active' => $centang]);
        return redirect(route('submenu.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function show(Submenu $submenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Submenu::find($id);
        $menu = Menu::orderBy('menu', 'asc')->pluck('menu', 'id');
        return view('back.a.pages.submenu.edit', compact('data', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $centang = ($request->input('is_active')) ? 1 : 0;
        $validated = $request->validate(
            [
                'menu_id' => 'required',
                'title' => 'required',
                'url' => 'required',
                'icon' => 'required',
            ],
        );
        Submenu::find($id)->update(
            $validated + ['is_active' => $centang]
        );
        return redirect(route('submenu.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submenu  $submenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($submenu)
    {
        $data = Submenu::destroy($submenu);
        return $data;
    }
}
