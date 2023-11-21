<?php

namespace App\Http\Controllers;

use App\Models\Themes;
use App\Models\Website;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Website::first();
        $themes = Themes::all();
        return view('back.a.pages.themes.index', compact('themes', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Themes  $themes
     * @return \Illuminate\Http\Response
     */
    public function show(Themes $themes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Themes  $themes
     * @return \Illuminate\Http\Response
     */
    public function edit(Themes $themes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Themes  $themes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = 1)
    {
        Website::find($id)->update([
            'themes_front' => $request->themes_front,
        ]);
        return redirect()->back()->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Themes  $themes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Themes $themes)
    {
        //
    }
}
