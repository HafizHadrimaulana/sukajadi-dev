<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //

    
    public function index(Request $request)
    {


        $data = DB::table('t_data_sarpras')->select('*')->get()->count();
        $prestasi = DB::table('t_data_penghargaan')->where('id_j_tahun', 5)->select('*')->get()->count();

        return view('page.publik.home',[
            'data' => $data,
            'prestasi' => $prestasi
        ]);
    }
}
