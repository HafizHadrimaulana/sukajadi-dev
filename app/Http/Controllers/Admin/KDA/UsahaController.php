<?php

namespace App\Http\Controllers\Admin\KDA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsahaExport;
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
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.kda.usaha.show', ['id' => $row->id_j_data_usaha]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        return view('page.admin.kda.usaha.index',[
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
                    $btn = '<button class="btn btn-sm btn-info mr-1"><i class="fa fa-edit"></i></button>';
                    $btn .= '<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }

        $data = DB::table('j_data_usaha')->select('*')->where('id_j_data_usaha', $id)->first();

        return view('page.admin.kda.usaha.detail',[
            'jenis' => $jenis,
            'data' => $data
        ]);
    }

    
    public function create(Request $request)
    {

        $jenis = DB::table('j_data_usaha')->select('*')->orderBy('nama_j_data_usaha','ASC')->get();
        $kelurahan = DB::table('j_kelurahan')->select('*')->orderBy('nama_j_kelurahan','ASC')->get();

        return view('page.admin.kda.usaha.create',[
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
            'nip' => 'required',
            'kelurahan' => 'required',
        ];

        $pesan = [
            'nama_pemilik.required' => 'Nama Pemilik Wajib Diisi!',
            'jenis.required' => 'Jenis Wajib Diisi!',
            'nip.required' => 'NIP Wajib Diisi!',
            'merk.required' => 'Merk/Brand Wajib Diisi!',
            'kelurahan.required' => 'Kelurahan Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                // dd($request->all());
                // $tgl = Carbon::parse($request->tgl);

                $data = new Usaha();
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
            return redirect()->route('admin.data.sarpras.show', $request->jenis);
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

    
    public function export(Request $request)
    {
        //
        // dd($request->all());
        $jenis = $request->jenis;

        return Excel::download(new UsahaExport($jenis), 'Data Usaha.xlsx');

    }
}
