<?php

namespace App\Http\Controllers\Admin\KDA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Mail\PengajuanKDA;
use App\Models\Pengajuan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsahaExport;
use App\Exports\PegawaiExport;
use App\Exports\SarprasExport;


use Mail;
class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis = DB::table('j_data_usaha')->select('*')->orderBy('nama_j_data_usaha','ASC')->get();

        if ($request->ajax()) {
            
            
            $data = DB::table("pengajuan as a")
            ->join("j_tahun as b", function($join){
                $join->on("b.id_j_tahun", "=", "a.id_j_tahun");
            })
            ->select("a.*", "b.nama_j_tahun")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                //     $btn = `<div class="dropdown">
                //     <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                //       Dropdown button
                //     </button>
                //     <div class="dropdown-menu">
                //       <a class="dropdown-item" href="`. route('admin.kda.pengajuan.show', ['id' => $row->id]) .`">Detail</a>
                //       <a class="dropdown-item" href="#">Another action</a>
                //       <a class="dropdown-item" href="#">Something else here</a>
                //     </div>
                //   </div>`;
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.kda.pengajuan.show', ['id' => $row->id]) .'><i class="fa fa-eye"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.kda.pengajuan.index',[
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
        
        $data = DB::table("pengajuan as a")
        ->join("j_tahun as b", function($join){
            $join->on("b.id_j_tahun", "=", "a.id_j_tahun");
        })
        ->where('a.id', '=', $id)
        ->select("a.*", "b.nama_j_tahun")
        ->first();

        return view('page.admin.kda.pengajuan.detail',[
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

    
    public function state(Request $request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try{

            $data = Pengajuan::where('id', $id)->first();
            $data->status = $request->status;
            $data->save();

            if($request->status == 'setuju'){
                if($data->jenis == 'Pegawai'){
                    $excelFile = Excel::download(new PegawaiExport("semua"), 'Data Pegawai.xlsx')->getFile();
                }else if($data->jenis == 'Sarana & Prasarana'){
                    $excelFile = Excel::download(new SarprasExport("semua"), 'Data Sarana & Prasarana.xlsx')->getFile();
                }else{
                    $excelFile = Excel::download(new UsahaExport("semua"), 'Data Usaha.xlsx')->getFile();
                }

                Mail::to($data->email)->send(new PengajuanKDA($data, $excelFile));
            }

        }catch(\QueryException $e){
            DB::rollback();
            dd($e);
        }

        DB::commit();
        return response()->json([
            'fail' => false,
            'pesan' => 'Status Pengajuan Berhasil Diperbaharui!',
        ]);
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
