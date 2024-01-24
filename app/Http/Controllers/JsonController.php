<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{
    //

    
    public function bulan(Request $request)
    {
        // dd($request->all());
        $tahun = $request->tahun;

        $data = DB::table("j_bulan as a")
        ->select("a.id_j_bulan as id", "a.nama_j_bulan as text")
        ->where('a.id_j_tahun', $tahun)
        ->orderBy('a.id_j_bulan', 'ASC')
        ->get();


        return response()->json($data);
    }
}
