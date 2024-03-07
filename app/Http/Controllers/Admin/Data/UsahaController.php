<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsahaExport;
use App\Models\Usaha;
class UsahaController extends Controller
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
            
            $data = DB::table("t_data_usaha as a")
            ->join("j_data_usaha as b", function($join){
                $join->on("b.id_j_data_usaha", "=", "a.id_j_data_usaha");
            })
            ->select("a.id_j_data_usaha", "b.nama_j_data_usaha", DB::raw('COUNT(*) as jumlah'))
            ->groupBy("a.id_j_data_usaha", "b.nama_j_data_usaha")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.data.usaha.show', ['id' => $row->id_j_data_usaha]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.data.usaha.index',[
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
        $jenis = DB::table('j_data_usaha')->select('*')->orderBy('nama_j_data_usaha','ASC')->get();

        if ($request->ajax()) {
            
            $data = DB::table("t_data_usaha as a")
            ->join("j_data_usaha as b", function($join){
                $join->on("b.id_j_data_usaha", "=", "a.id_j_data_usaha");
            })
            ->join("j_sopd as c", function($join){
                $join->on("c.id_j_sopd", "=", "a.kelurahan_t_data_usaha");
            })
            ->select("a.*", "b.nama_j_data_usaha", "c.nama_j_sopd")
            ->where('a.id_j_data_usaha', $id)
            ->get();

            return DataTables::of($data)
                ->addColumn('action', function($row){
                    // $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.mitra.show', ['id' => $row->id_j_data_mitra, 'tahun' => $tahun]) .'><i class="fa fa-list"></i> Detail</a>';
                    $btn = '<a class="btn btn-sm btn-info mr-1" href="'. route('admin.data.usaha.edit', $row->id_t_data_usaha) .'"><i class="fa fa-edit"></i></a>';
                    $btn .= '<button class="btn btn-sm btn-danger" onclick="hapus('. $row->id_t_data_usaha .')"><i class="fa fa-trash"></i></button>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        $data = DB::table('j_data_usaha')->select('*')->where('id_j_data_usaha', $id)->first();

        return view('page.admin.data.usaha.detail',[
            'jenis' => $jenis,
            'data' => $data
        ]);
    }

    
    public function create(Request $request)
    {

        $jenis = DB::table('j_data_usaha')->select('*')->orderBy('nama_j_data_usaha','ASC')->get();
        $kelurahan = DB::table('j_kelurahan')->select('*')->orderBy('nama_j_kelurahan','ASC')->get();

        return view('page.admin.data.usaha.create',[
            'jenis' => $jenis,
            'kelurahan' => $kelurahan
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
        // dd($request->all());
        $rules = [
            'nama_pemilik' => 'required',
            'jenis' => 'required',
            'merk' => 'required',
            'nik' => 'required',
            'kelurahan' => 'required',
        ];

        $pesan = [
            'nama_pemilik.required' => 'Nama Pemilik Wajib Diisi!',
            'jenis.required' => 'Jenis Wajib Diisi!',
            'nik.required' => 'NIK Wajib Diisi!',
            'merk.required' => 'Merk/Brand Wajib Diisi!',
            'kelurahan.required' => 'Kelurahan Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            dd($validator->errors());
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                // dd($request->all());
                // $tgl = Carbon::parse($request->tgl);

                $data = new Usaha();
                $data->id_j_tahun = 0;
                $data->id_j_data_usaha = $request->jenis;
                $data->nama_t_data_usaha = $request->nama;
                $data->pemilik_t_data_usaha = $request->nama_pemilik;
                $data->nik_t_data_usaha = $request->nik;
                $data->izin_t_data_usaha = $request->izin;
                $data->no_izin_t_data_usaha = $request->no_izin;
                $data->tahun_berdiri_t_data_usaha = $request->tahun;
                $data->alamat_t_data_usaha = $request->alamat;
                $data->rt_t_data_usaha = $request->rt;
                $data->rw_t_data_usaha = $request->rw;
                $data->kelurahan_t_data_usaha = $request->kelurahan;
                $data->keterangan_t_data_usaha = $request->keterangan;
                $data->jenis_t_data_usaha = $request->jenis_usaha;
                $data->produk_t_data_usaha = $request->produk;
                $data->email_t_data_usaha = $request->email;
                $data->sosmed_t_data_usaha = $request->sosmed;
                $data->telp_t_data_usaha = $request->hp;

                // $data->file1_t_data_usaha = $request->lng;

                $data->user_id = auth()->user()->id;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.data.usaha.show', $request->jenis);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('t_data_usaha')->select('*')->where('id_t_data_usaha', $id)->first();
        $jenis = DB::table('j_data_usaha')->select('*')->orderBy('nama_j_data_usaha','ASC')->get();
        $kelurahan = DB::table('j_kelurahan')->select('*')->orderBy('nama_j_kelurahan','ASC')->get();

        return view('page.admin.data.usaha.edit',[
            'data' => $data,
            'jenis' => $jenis,
            'kelurahan' => $kelurahan
        ]);
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
        $rules = [
            'nama_pemilik' => 'required',
            'jenis' => 'required',
            'merk' => 'required',
            'nik' => 'required',
            'kelurahan' => 'required',
        ];

        $pesan = [
            'nama_pemilik.required' => 'Nama Pemilik Wajib Diisi!',
            'jenis.required' => 'Jenis Wajib Diisi!',
            'nik.required' => 'NIK Wajib Diisi!',
            'merk.required' => 'Merk/Brand Wajib Diisi!',
            'kelurahan.required' => 'Kelurahan Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{

                $data = Usaha::where('id_t_data_usaha', $id)->first();
                $data->id_j_tahun = 0;
                $data->id_j_data_usaha = $request->jenis;
                $data->nama_t_data_usaha = $request->nama;
                $data->pemilik_t_data_usaha = $request->nama_pemilik;
                $data->nik_t_data_usaha = $request->nik;
                $data->izin_t_data_usaha = $request->izin;
                $data->no_izin_t_data_usaha = $request->no_izin;
                $data->tahun_berdiri_t_data_usaha = $request->tahun;
                $data->alamat_t_data_usaha = $request->alamat;
                $data->rt_t_data_usaha = $request->rt;
                $data->rw_t_data_usaha = $request->rw;
                $data->kelurahan_t_data_usaha = $request->kelurahan;
                $data->keterangan_t_data_usaha = $request->keterangan;
                $data->jenis_t_data_usaha = $request->jenis_usaha;
                $data->produk_t_data_usaha = $request->produk;
                $data->email_t_data_usaha = $request->email;
                $data->sosmed_t_data_usaha = $request->sosmed;
                $data->telp_t_data_usaha = $request->hp;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.data.usaha.show', $request->jenis);
        }
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

            $data = Usaha::where('id_t_data_usaha', $id)->first();
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

    
    public function export(Request $request)
    {
        //
        // dd($request->all());
        $jenis = $request->jenis;

        return Excel::download(new UsahaExport($jenis), 'Data Usaha.xlsx');

    }
}
