<?php

namespace App\Http\Controllers;

use App\Helpers\Seo;
use App\Models\Kategori;
use App\Models\Upload;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElearningController extends Controller
{
    public function __construct()
    {
        $this->themes = Website::all()->first();
    }

    public function index()
    {
        Seo::seO();
        $data = Kategori::get();
        // $data = DB::table('front_menus')
        //     ->where('menu_url', '=', $id)
        //     ->get();
        return view('front.' . $this->themes->themes_front . '.pages.elearning', compact('data'));
    }

    public function daftarbook($id)
    {
        Seo::seO();
        $data = Upload::where('id_kategori', $id)->get();
        // $data = DB::table('front_menus')
        //     ->where('menu_url', '=', $id)
        //     ->get();
        return view('front.' . $this->themes->themes_front . '.pages.elearningbook', compact('data'));
    }

    public function detailbook($id)
    {
        Seo::seO();
        $data = Upload::find($id);
        // $data = DB::table('front_menus')
        //     ->where('menu_url', '=', $id)
        //     ->get();
        return view('front.' . $this->themes->themes_front . '.pages.elearningdetail', compact('data'));
    }
}
