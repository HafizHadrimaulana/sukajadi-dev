<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;

class PenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis = DB::table('j_data_penghargaan')->select('*')->orderBy('nama_j_data_penghargaan','ASC')->get();

        if ($request->ajax()) {
            
            
            $data = DB::table("t_data_penghargaan as a")
            ->select(DB::raw('YEAR(tanggal_t_data_penghargaan) as tahun'), DB::raw('COUNT(*) as jumlah'))
            ->groupBy('tahun')
            ->orderBy('tahun', 'ASC')
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.penghargaan.show', ['id' => $row->tahun]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.data.penghargaan.index',[
            'jenis' => $jenis,
        ]);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $jenis = DB::table('j_data_penghargaan')->select('*')->orderBy('nama_j_data_penghargaan','ASC')->get();

        if ($request->ajax()) {
            
            $data = DB::table("t_data_penghargaan as a")
            ->join("j_data_penghargaan as b", function($join){
                $join->on("b.id_j_data_penghargaan", "=", "a.id_j_data_penghargaan");
            })
            ->join("j_sopd as c", function($join){
                $join->on("c.id_j_sopd", "=", "a.sopd_t_data_penghargaan");
            })
            ->whereYear('a.tanggal_t_data_penghargaan', $id)
            ->select("a.*", "nama_j_data_penghargaan", "nama_j_sopd")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    // $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.mitra.show', ['id' => $row->id_j_data_mitra, 'tahun' => $tahun]) .'><i class="fa fa-list"></i> Detail</a>';
                    $btn = '<button class="btn btn-sm btn-info mr-1"><i class="fa fa-edit"></i></button>';
                    $btn .= '<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.data.penghargaan.detail',[
            'jenis' => $jenis,
            'tahun' => $id
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
