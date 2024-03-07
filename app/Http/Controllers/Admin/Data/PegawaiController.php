<?php
namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\Pegawai;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PegawaiExport;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis = DB::table('j_data_pegawai')->select('*')->orderBy('nama_j_data_pegawai','ASC')->get();

        if ($request->ajax()) {
            
            
            $data = DB::table("t_data_pegawai as a")
            ->join("j_data_pegawai as b", function($join){
                $join->on("b.id_j_data_pegawai", "=", "a.id_j_data_pegawai");
            })
            ->select("a.id_j_data_pegawai", "b.nama_j_data_pegawai", DB::raw('COUNT(*) as jumlah'))
            ->groupBy("a.id_j_data_pegawai", "b.nama_j_data_pegawai")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.data.pegawai.show', ['id' => $row->id_j_data_pegawai]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.data.pegawai.index',[
            'jenis' => $jenis,
        ]);
    }

    public function create(Request $request)
    {

        $jenis = DB::table('j_data_pegawai')->select('*')->orderBy('nama_j_data_pegawai','ASC')->get();
        $sopd = DB::table('j_sopd')->select('*')->orderBy('nama_j_sopd','ASC')->get();

        return view('page.admin.data.pegawai.create',[
            'jenis' => $jenis,
            'sopd' => $sopd
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
        $jenis = DB::table('j_data_pegawai')->select('*')->orderBy('nama_j_data_pegawai','ASC')->get();

        if ($request->ajax()) {
            
            $data = DB::table("t_data_pegawai as a")
            ->join("j_sopd as c", function($join){
                $join->on("c.id_j_sopd", "=", "a.sopd_t_data_pegawai");
            })
            ->select("a.*", "c.nama_j_sopd")
            ->where('a.id_j_data_pegawai', $id)
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    // $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.mitra.show', ['id' => $row->id_j_data_mitra, 'tahun' => $tahun]) .'><i class="fa fa-list"></i> Detail</a>';
                    $btn = '<a class="btn btn-sm btn-info mr-1" href="'. route('admin.data.pegawai.edit', $row->id_t_data_pegawai) .'"><i class="fa fa-edit"></i></a>';
                    $btn .= '<button class="btn btn-sm btn-danger" onclick="hapus('. $row->id_t_data_pegawai .')"><i class="fa fa-trash"></i></button>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        $data = DB::table('j_data_pegawai')->select('*')->where('id_j_data_pegawai', $id)->first();

        return view('page.admin.data.pegawai.detail',[
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
        $rules = [
            'nama' => 'required',
            'jenis' => 'required',
            'jk' => 'required',
            'nip' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'jenis.required' => 'Jenis Wajib Diisi!',
            'jk.required' => 'Jenis Kelamin Wajib Diisi!',
            'nip.required' => 'NIP Wajib Diisi!',
            'kel.required' => 'Kelurahan Wajib Diisi!',
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

                $data = new Pegawai();
                $data->id_j_tahun = 0;
                $data->id_j_data_pegawai = $request->jenis;
                $data->nama_t_data_pegawai = $request->nama;
                $data->nip_t_data_pegawai = $request->nip;
                $data->ttl_t_data_pegawai = $request->ttl;
                $data->sopd_t_data_pegawai = $request->sopd;
                $data->pangkat_t_data_pegawai = $request->pangkat;
                $data->gol_t_data_pegawai = $request->gol;
                $data->esselon_t_data_pegawai = $request->esselon;
                $data->gender_t_data_pegawai = $request->jk;
                $data->pendidikan_t_data_pegawai = $request->pendidikan;
                $data->email_t_data_pegawai = $request->email;
                $data->telp_t_data_pegawai = $request->hp;
                $data->jabatan_t_data_pegawai = $request->jabatan;
                $data->jabatan_lainnya_t_data_pegawai = $request->jabatan_lainnya;
                $data->user_id = auth()->user()->id;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.data.pegawai.show', $request->jenis);
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
        $data = DB::table('t_data_pegawai')->select('*')->where('id_t_data_pegawai', $id)->first();
        

        $jenis = DB::table('j_data_pegawai')->select('*')->orderBy('nama_j_data_pegawai','ASC')->get();
        $sopd = DB::table('j_sopd')->select('*')->orderBy('nama_j_sopd','ASC')->get();


        // dd($data);
        return view('page.admin.data.pegawai.edit',[
            'data' => $data,
            'jenis' => $jenis,
            'sopd' => $sopd
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
            'nama' => 'required',
            'jenis' => 'required',
            'jk' => 'required',
            'nip' => 'required',
            // 'lokasi' => 'required',
            // 'jadwal' => 'required',
            // 'mulai' => 'required',
            // 'selesai' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'jenis.required' => 'Jenis Wajib Diisi!',
            'jk.required' => 'Jenis Kelamin Wajib Diisi!',
            'nip.required' => 'NIP Wajib Diisi!',
            'kel.required' => 'Kelurahan Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                // dd($request->all());
                // $tgl = Carbon::parse($request->tgl);

                $data = Pegawai::where('id_t_data_pegawai', $id)->first();
                $data->id_j_tahun = 0;
                $data->id_j_data_pegawai = $request->jenis;
                $data->nama_t_data_pegawai = $request->nama;
                $data->nip_t_data_pegawai = $request->nip;
                $data->ttl_t_data_pegawai = $request->ttl;
                $data->sopd_t_data_pegawai = $request->sopd;
                $data->pangkat_t_data_pegawai = $request->pangkat;
                $data->gol_t_data_pegawai = $request->gol;
                $data->esselon_t_data_pegawai = $request->esselon;
                $data->gender_t_data_pegawai = $request->jk;
                $data->pendidikan_t_data_pegawai = $request->pendidikan;
                $data->email_t_data_pegawai = $request->email;
                $data->telp_t_data_pegawai = $request->hp;
                $data->jabatan_t_data_pegawai = $request->jabatan;
                $data->jabatan_lainnya_t_data_pegawai = $request->jabatan_lainnya;
                $data->user_id = auth()->user()->id;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.data.pegawai.show', $request->jenis);
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

            $data = Pegawai::where('id_t_data_pegawai', $id)->first();
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
        $jenis = $request->jenis;
        return Excel::download(new PegawaiExport($jenis), 'Data Pegawai.xlsx');

    }
}
