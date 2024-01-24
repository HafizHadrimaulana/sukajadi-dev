<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;

class UnggulanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis = DB::table('j_data_unggulan')->select('*')->orderBy('nama_j_data_unggulan','ASC')->get();

        if ($request->ajax()) {
            
            
            $data = DB::table("t_data_unggulan as a")
            ->join("j_data_unggulan as b", function($join){
                $join->on("b.id_j_data_unggulan", "=", "a.id_j_data_unggulan");
            })
            ->select("a.id_j_data_unggulan", "b.nama_j_data_unggulan", DB::raw('COUNT(*) as jumlah'))
            ->groupBy("a.id_j_data_unggulan")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.unggulan.show', ['id' => $row->id_j_data_unggulan]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.data.unggulan.index',[
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
        $jenis = DB::table('j_data_unggulan')->select('*')->orderBy('nama_j_data_unggulan','ASC')->get();

        if ($request->ajax()) {
            
            $data = DB::table("t_data_unggulan as a")
            ->join("j_data_unggulan as b", function($join){
                $join->on("b.id_j_data_unggulan", "=", "a.id_j_data_unggulan");
            })
            ->join("j_sopd as c", function($join){
                $join->on("c.id_j_sopd", "=", "a.kelurahan_t_data_unggulan");
            })
            ->select("a.*", "b.nama_j_data_unggulan", "c.nama_j_sopd")
            ->where('a.id_j_data_unggulan', $id)
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

        $data = DB::table('j_data_unggulan')->select('*')->where('id_j_data_unggulan', $id)->first();

        return view('page.admin.data.unggulan.detail',[
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('t_data_medsos')->select('*')
        ->where('id_t_data_medsos', $id)->first();

        return response()->json($data);
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
        DB::beginTransaction();
        try{

            $data = DB::table('t_data_medsos')::where('id_t_data_medsos', $id)->first();
            $data->delete();

        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'fail' => true,
                'errors' => $e,
                'pesan' => 'Gagal Hapus Data!',
            ]);
        }

        DB::commit();
        return response()->json([
            'fail' => false,
            'pesan' => 'Berhasil Hapus Data!',
        ]);
    }
}
