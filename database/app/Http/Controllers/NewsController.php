<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = News::orderBy('date', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($data) {
                        $actionBtn = '
                    <div class="list-icons d-flex justify-content-center text-center">
                        <a href="' . route('news.edit', $data->id) . ' " class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i> Edit</a>
                        <a href="' . route('news.destroy', $data->id) . ' " class="btn btn-simple btn-danger btn-icon delete-data-table"><i class="material-icons">close</i> Delete</a>
                    </div>';
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
                ->rawColumns(['action', 'tgl'])
                ->make(true);
        }
        return view('back.a.pages.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.a.pages.news.create');
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
                'title' => 'required',
                'date' => 'required',
                'description' => 'required',
            ]);
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->store('news');
            $data = [
                'photo' => $name,
                'path' => $path,
                'title' => $request->title,
                'date' => $request->date,
                'upload_by' => auth()->user()->id,
                'description' => $request->description,
                'slug' => SlugService::createSlug(News::class, 'slug', $request->title),
            ];
        } else {
            $validated = $request->validate([
                'title' => 'required',
                'date' => 'required',
                'description' => 'required',
            ]);
            $data = [
                'title' => $request->title,
                'date' => $request->date,
                'upload_by' => auth()->user()->id,
                'description' => $request->description,
                'slug' => SlugService::createSlug(News::class, 'slug', $request->title),
            ];
        }
        News::create($data);
        return redirect(route('news.index'))->with(['success' => 'Data added successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
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
        $data = News::find($id);
        return view('back.a.pages.news.edit', compact('data'));
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
        if ($request->hasFile('photo')) {
            $validated = $request->validate([
                'photo' => 'required|image|max:12048',
                'title' => 'required',
                'description' => 'required',
            ]);
            $gambar = News::where('id', $id)->first();
            if ($request->file('photo')->getClientOriginalName() != $gambar->photo) {
                Storage::delete($gambar->path);
                $name = $request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->store('news');
                $data = [
                    'photo' => $name,
                    'path' => $path,
                    'title' => $request->title,
                    'date' => $request->date,
                    'upload_by' => auth()->user()->id,
                    'description' => $request->description,
                ];
            }
        } else {
            $validated = $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);
            $data = [
                'title' => $request->title,
                'date' => $request->date,
                'upload_by' => auth()->user()->id,
                'description' => $request->description,
            ];
        }
        News::find($id)->update($data);
        return redirect(route('news.index'))->with(['success' => 'Data has been successfully changed!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = News::where('id', $id)->first();
        if (Storage::exists($gambar->path)) {
            Storage::delete($gambar->path);
        }
        $data = News::find($id);
        return $data->delete();
    }
}
