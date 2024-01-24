<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;


use App\Models\Mitra;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis = DB::table('j_data_mitra')->select('*')->orderBy('nama_j_data_mitra','ASC')->get();

        if ($request->ajax()) {
            
            $tahun = $request->tahun;
            
            $data = DB::table("t_data_mitra as a")
            ->join("j_data_mitra as b", function($join){
                $join->on("b.id_j_data_mitra", "=", "a.id_j_data_mitra");
            })
            ->select("a.id_j_data_mitra", "b.nama_j_data_mitra", DB::raw('COUNT(*) as jumlah', 'a.id_j_tahun'))
            ->where('a.id_j_tahun', $tahun)
            ->groupBy("a.id_j_data_mitra")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row) use ($tahun){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.mitra.show', ['id' => $row->id_j_data_mitra, 'tahun' => $tahun]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.data.mitra.index',[
            'jenis' => $jenis,
        ]);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $tahun, Request $request)
    {
        $jenis = DB::table('j_data_mitra')->select('*')->orderBy('nama_j_data_mitra','ASC')->get();

        if ($request->ajax()) {
            
            $data = DB::table("t_data_mitra as a")
            ->join("j_data_mitra as b", function($join){
                $join->on("b.id_j_data_mitra", "=", "a.id_j_data_mitra");
            })
            ->select("a.*", "b.nama_j_data_mitra")
            ->where('a.id_j_data_mitra', $id)
            ->get();
            return DataTables::of($data)
                // ->addColumn('action', function($row) use ($tahun){
                //     $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.mitra.show', ['id' => $row->id_j_data_mitra, 'tahun' => $tahun]) .'><i class="fa fa-list"></i> Detail</a>';
                //     return $btn; 
                // })
                // ->rawColumns(['action']) 
                ->make(true);
        }

        $data = DB::table('j_data_mitra')->select('*')->where('id_j_data_mitra', $id)->first();

        return view('page.admin.data.mitra.detail',[
            'jenis' => $jenis,
            'data' => $data
        ]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
