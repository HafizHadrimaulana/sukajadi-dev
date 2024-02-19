<?php

namespace App\Http\Controllers\Admin\KDA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use App\Models\Sarpras;


use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SarprasExport;
class SaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis = DB::table('j_data_sarpras')->select('*')->orderBy('nama_j_data_sarpras','ASC')->get();

        if ($request->ajax()) {
            
            
            $data = DB::table("t_data_sarpras as a")
            ->join("j_data_sarpras as b", function($join){
                $join->on("b.id_j_data_sarpras", "=", "a.id_j_data_sarpras");
            })
            ->select("a.id_j_data_sarpras", "b.nama_j_data_sarpras", DB::raw('COUNT(*) as jumlah'))
            ->groupBy("a.id_j_data_sarpras", "b.nama_j_data_sarpras")
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.sarpras.show', ['id' => $row->id_j_data_sarpras]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.kda.sarpras.index',[
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
        $jenis = DB::table('j_data_sarpras')->select('*')->orderBy('nama_j_data_sarpras','ASC')->get();

        if ($request->ajax()) {
            
            $data = DB::table("t_data_sarpras as a")
            ->join("j_data_sarpras as b", function($join){
                $join->on("b.id_j_data_sarpras", "=", "a.id_j_data_sarpras");
            })
            ->join("j_kelurahan as c", function($join){
                $join->on("c.id_j_kelurahan", "=", "a.kelurahan_t_data_sarpras");
            })
            ->select("a.*", "b.nama_j_data_sarpras", "c.nama_j_kelurahan")
            ->when($this->jenis != "semua", function($q, $jenis){
                return $q->where('a.id_j_data_sarpras', '=', $jenis);
            })
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    // $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.mitra.show', ['id' => $row->id_j_data_mitra, 'tahun' => $tahun]) .'><i class="fa fa-list"></i> Detail</a>';
                    $btn = '<a class="btn btn-sm btn-info mr-1" href='. route('admin.sarpras.edit', ['id' => $row->id_t_data_sarpras]) .'><i class="fa fa-edit"></i></a>';
                    $btn .= '<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        $data = DB::table('j_data_sarpras')->select('*')->where('id_j_data_sarpras', $id)->first();

        return view('page.admin.kda.sarpras.detail',[
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
    public function create(Request $request)
    {
        $jenis = DB::table('j_data_sarpras')->select('*')->orderBy('nama_j_data_sarpras','ASC')->get();
        $kelurahan = DB::table('j_kelurahan')->select('*')->orderBy('nama_j_kelurahan','ASC')->get();

        return view('page.admin.kda.sarpras.create',[
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
            'nama' => 'required',
            'jenis' => 'required',
            'lokasi' => 'required',
            'kel' => 'required',
            'lokasi' => 'required',
            // 'jadwal' => 'required',
            // 'mulai' => 'required',
            // 'selesai' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'lokasi.required' => 'Lokasi / Alamat Wajib Diisi!',
            'jenis.required' => 'Jenis Wajib Diisi!',
            'lokasi.required' => 'Lokasi/Alamat Wajib Diisi!',
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

                $data = new Sarpras();
                $data->id_j_tahun = 0;
                $data->id_j_data_sarpras = $request->jenis;
                $data->nama_t_data_sarpras = $request->nama;
                $data->alamat_t_data_sarpras = $request->lokasi;
                $data->rt_t_data_sarpras = $request->rw;
                $data->rw_t_data_sarpras = $request->rt;
                $data->kelurahan_t_data_sarpras = $request->kel;
                $data->keterangan_t_data_sarpras = $request->keterangan;
                $data->detail_t_data_sarpras = $request->detail;
                $data->lat_t_data_sarpras = $request->lat;
                $data->lng_t_data_sarpras = $request->lng;
                $data->user_id = auth()->user()->id;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.kda.sarpras.show', $request->jenis);
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
        $jenis = DB::table('j_data_sarpras')->select('*')->orderBy('nama_j_data_sarpras','ASC')->get();
        $kelurahan = DB::table('j_kelurahan')->select('*')->orderBy('nama_j_kelurahan','ASC')->get();

        $data = DB::table('t_data_sarpras')->where('id_t_data_sarpras', $id)->first();
        return view('page.admin.kda.sarpras.edit',[
            'jenis' => $jenis,
            'kelurahan' => $kelurahan,
            'data' => $data
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
            'lokasi' => 'required',
            'kel' => 'required',
            'lokasi' => 'required',
            // 'jadwal' => 'required',
            // 'mulai' => 'required',
            // 'selesai' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'lokasi.required' => 'Lokasi / Alamat Wajib Diisi!',
            'jenis.required' => 'Jenis Wajib Diisi!',
            'lokasi.required' => 'Lokasi/Alamat Wajib Diisi!',
            'kel.required' => 'Kelurahan Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{

                $data = Sarpras::where('id_t_data_sarpras', $id)->first();
                $data->id_j_tahun = 0;
                $data->id_j_data_sarpras = $request->jenis;
                $data->nama_t_data_sarpras = $request->nama;
                $data->alamat_t_data_sarpras = $request->lokasi;
                $data->rt_t_data_sarpras = $request->rw;
                $data->rw_t_data_sarpras = $request->rt;
                $data->kelurahan_t_data_sarpras = $request->kel;
                $data->keterangan_t_data_sarpras = $request->keterangan;
                $data->detail_t_data_sarpras = $request->detail;
                $data->lat_t_data_sarpras = $request->lat;
                $data->lng_t_data_sarpras = $request->lng;
                $data->user_id_update = auth()->user()->id;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.sarpras.show', $request->jenis);
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
        //
    }

    
    
    public function export(Request $request)
    {
        $jenis = $request->jenis;
        // dd($jenis);
        return Excel::download(new SarprasExport($jenis), 'Data Sarana & Prasarana.xlsx');

    }
}
