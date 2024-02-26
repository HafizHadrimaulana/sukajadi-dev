<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Carbon\Carbon;
use PDF;
use App\Mail\SuratPermohonan;
use App\Models\Pengantar;
use Mail;
class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $data = DB::table("pengantar as a")
            ->join("j_kelurahan as b", function($join){
                $join->on("b.id_j_kelurahan", "=", "a.kelurahan_id");
            })
            ->select("a.*", "b.nama_j_kelurahan")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.permohonan.show', ['id' => $row->id]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->addColumn('created_at', function($row){
                    return Carbon::parse($row->created_at)->translatedFormat('d F Y H:i') . ' WIB'; 
                })
                ->addColumn('kategori', function($row){
                    if($row->kategori == 'ktp'){
                        $result = 'Pengantar KTP';
                    }elseif($row->kategori == 'kk'){
                        $result = 'Pengantar KK';
                    }elseif($row->kategori == 'pindah'){
                        $result = 'Surat Keterangan Pindah / Masuk';
                    }elseif($row->kategori == 'usaha'){
                        $result = 'Surat Izin Usaha';
                    }elseif($row->kategori == 'domisili'){
                        $result = 'Surat Domisili';
                    }

                    return $result;

                })
                ->rawColumns(['action', 'created_at', 'kategori']) 
                ->make(true);
        }

        return view('page.admin.permohonan.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table("pengantar as a")
            ->join("j_kelurahan as b", function($join){
                $join->on("b.id_j_kelurahan", "=", "a.kelurahan_id");
            })
            ->select("a.*", "b.nama_j_kelurahan")
            ->where('a.id', '=', $id)
            ->first();
        
        return view('page.admin.permohonan.show', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table("pengantar as a")
            ->join("j_kelurahan as b", function($join){
                $join->on("b.id_j_kelurahan", "=", "a.kelurahan_id");
            })
            ->join("j_sopd as c", function($join){
                $join->on("c.id_j_sopd", "=", "b.sopd_id");
            })
            ->select("a.*", "b.nama_j_kelurahan", "c.nama_pimpinan as lurah")
            ->where('a.id', '=', $id)
            ->first();
        
        if($data->kategori == 'ktp'){
            $title = 'KTP';
        }elseif($data->kategori == 'kk'){
            $title = 'KK';
        }elseif($data->kategori == 'pindah'){
            $title = 'Pindah / Masuk';
        }elseif($data->kategori == 'usaha'){
            $title = 'Izin Usaha';
        }elseif($data->kategori == 'domisili'){
            $title = 'Domisili';
        }
        $config = [
            'format' => 'A4-P'
        ];

        // dd($data->toArray());
        $pdf = PDF::loadView('pdf.permohonan', [
            'data' => $data,
            'title' => $title
        ], [ ], $config);

        return $pdf->stream('Surat Pengantar '. $title .'.pdf');
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

            $data = Pengajuan::where('id', $id)->first();
            $data->delete();

        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'fail' => true,
                'errors' => $e,
                'pesan' => 'Gagal Menghapus Data!',
            ]);
        }

        DB::commit();
        return response()->json([
            'fail' => false,
            'pesan' => 'Data Berhasil Dihapus!',
        ]);
    }

    
    public function state(Request $request, $id)
    {
        DB::beginTransaction();
        try{

            $data = Pengantar::where('id', $id)->first();
            $data->status = $request->status;
            $data->save();

            if($request->status == 'setuju'){
                
                $query = DB::table("pengantar as a")
                ->join("j_kelurahan as b", function($join){
                    $join->on("b.id_j_kelurahan", "=", "a.kelurahan_id");
                })
                ->join("j_sopd as c", function($join){
                    $join->on("c.id_j_sopd", "=", "b.sopd_id");
                })
                ->select("a.*", "b.nama_j_kelurahan", "c.nama_pimpinan as lurah")
                ->where('a.id', '=', $id)
                ->first();
            
                if($data->kategori == 'ktp'){
                    $title = 'KTP';
                }elseif($data->kategori == 'kk'){
                    $title = 'KK';
                }elseif($data->kategori == 'pindah'){
                    $title = 'Surat Pindah / Masuk';
                }elseif($data->kategori == 'usaha'){
                    $title = 'Surat Izin Usaha';
                }elseif($data->kategori == 'domisili'){
                    $title = 'Surat Domisili';
                }
                $config = [
                    'format' => 'A4-P'
                ];

                // dd($data->toArray());
                $pdf = PDF::loadView('pdf.permohonan', [
                    'data' => $query,
                    'title' => $title
                ], [ ], $config);
                Mail::to($data->email)->send(new SuratPermohonan($data, $pdf->Output('pengantar.pdf')));
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
}
