<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;

class PKLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis = DB::table('j_data_pkl')->select('*')->orderBy('nama_j_data_pkl','ASC')->get();

        if ($request->ajax()) {
            
            
            $data = DB::table("t_data_pkl as a")
            ->join("j_kelurahan as b", function($join){
                $join->on("b.id_j_kelurahan", "=", "a.kelurahan_t_data_pkl");
            })
            ->select("a.kelurahan_t_data_pkl", "b.nama_j_kelurahan", DB::raw('COUNT(*) as jumlah'))
            ->groupBy("a.kelurahan_t_data_pkl", "b.nama_j_kelurahan")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.pkl.show', ['id' => $row->kelurahan_t_data_pkl]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.data.pkl.index',[
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
        $jenis = DB::table('j_data_pkl')->select('*')->orderBy('nama_j_data_pkl','ASC')->get();

        if ($request->ajax()) {
            
            $data = DB::table("t_data_pkl as a")
            ->join("j_data_pkl as b", function($join){
                $join->on("b.id_j_data_pkl", "=", "a.id_j_data_pkl");
            })
            ->join("j_kelurahan as c", function($join){
                $join->on("c.id_j_kelurahan", "=", "a.kelurahan_t_data_pkl");
            })
            ->select("a.*", "b.nama_j_data_pkl", "c.nama_j_kelurahan")
            ->where('a.id_j_data_pkl', $id)
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

        $data = DB::table('j_data_pkl')->select('*')->where('id_j_data_pkl', $id)->first();

        return view('page.admin.data.pkl.detail',[
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
        $data = DB::table('t_data_pkl')->select('*')
        ->where('id_t_data_pkl', $id)->first();

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

            $data = DB::table('t_data_pkl')::where('id_t_data_pkl', $id)->first();
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
