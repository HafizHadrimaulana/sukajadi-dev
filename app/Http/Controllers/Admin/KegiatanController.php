<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use App\Models\Kegiatan;
use Storage;
class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            
            $tahun = $request->tahun;
            $bulan = $request->bulan;
            $sopd = $request->sopd;
            
            $data = DB::table("t_kegiatan as a")
            ->join("j_kegiatan as b", function($join){
                $join->on("b.id_j_kegiatan", "=", "a.id_j_kegiatan");
            })
            ->join("j_satuan as c", function($join){
                $join->on("c.id_j_satuan", "=", "a.id_j_satuan");
            })
            // ->join("j_sopd as d", function($join){
            //     $join->on("d.id_j_sopd", "=", "a.id_j_sopd");
            // })
            ->select("a.*", "b.nama_j_kegiatan", "c.nama_j_satuan")
            ->where('a.id_j_tahun', $tahun)
            ->when($bulan != "", function($q, $bulan){
                return $q->where('a.id_j_bulan', $bulan);
            })
            // ->where('a.id_j_tahun', $tahun)
            ->get();
            return DataTables::of($data)
                ->addColumn('action', function($row) use ($tahun){
                    $btn = '<div class="dropdown">
                    <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-list mr-1"></i> Aksi
                    </a>';
                  
                    $btn .= '<div class="dropdown-menu dropdown-menu-right">';
                    $btn .= '<a class="dropdown-item" href="'. route('admin.kegiatan.show', $row->id_t_kegiatan) .'">Detail</a>';
                    $btn .= '<a class="dropdown-item" href="'. route('admin.kegiatan.edit', $row->id_t_kegiatan) .'">Ubah</a>';
                    $btn .= '<a class="dropdown-item" href="#">Hapus</a>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn; 
                })
                ->addColumn('foto_awal_t_kegiatan', function($row) use ($tahun){
                    $btn = '<div class="img-preview"><img src="/storage'. $row->foto_awal_t_kegiatan .'"/></div>';
                    return $btn; 
                })
                ->addColumn('foto_proses_t_kegiatan', function($row) use ($tahun){
                    $btn = '<div class="img-preview"><img src="/storage'. $row->foto_proses_t_kegiatan .'"/></div>';
                    return $btn; 
                })
                ->addColumn('foto_akhir_t_kegiatan', function($row) use ($tahun){
                    $btn = '<div class="img-preview"><img src="/storage'. $row->foto_akhir_t_kegiatan .'"/></div>';
                    return $btn; 
                })
                ->rawColumns(['action', 'foto_awal_t_kegiatan', 'foto_proses_t_kegiatan', 'foto_akhir_t_kegiatan']) 
                ->make(true);
        }
        return view('page.admin.laporan.kegiatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = DB::table('j_kegiatan')->select('*')->orderBy('nama_j_kegiatan','ASC')->get();
        $satuan = DB::table('j_satuan')->select('*')->orderBy('nama_j_satuan','ASC')->get();

        return view('page.admin.laporan.kegiatan.create',[
            'jenis' => $jenis,
            'satuan' => $satuan
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
            'tgl' => 'required',
            'jenis_kegiatan' => 'required',
            'volume' => 'required',
            'satuan' => 'required',
            'lokasi' => 'required',
            // 'jadwal' => 'required',
            // 'mulai' => 'required',
            // 'selesai' => 'required',
        ];

        $pesan = [
            'tgl.required' => 'Tanggal Wajib Diisi!',
            'lokasi.required' => 'Lokasi / Alamat Wajib Diisi!',
            'jenis_kegiatan.required' => 'Jenis Kegiatan Wajib Diisi!',
            'volume.required' => 'Volume Wajib Diisi!',
            'satuan.required' => 'Satuan Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                $tgl = Carbon::parse($request->tgl);

                $data = new Kegiatan();
                $data->id_j_tahun = $tgl->format('Y');
                $data->id_j_bulan = $tgl->format('Ym');
                $data->tanggal_t_kegiatan = $tgl->format('Y-m-d');
                $data->id_j_kegiatan = $request->jenis_kegiatan;
                $data->volume_t_kegiatan = $request->volume;
                $data->id_j_satuan = $request->satuan;
                $data->keterangan_t_kegiatan = $request->keterangan;
                $data->lokasi_t_kegiatan = $request->lokasi;
                $data->lat_t_kegiatan = $request->lat;
                $data->lng_t_kegiatan = $request->lng;

                if($request->foto1){
                    $fileName = time().uniqid() . '.' . $request->foto1->extension();
                    Storage::disk('public')->putFileAs('uploads/kegiatan', $request->foto1, $fileName);
                    $data->foto_awal_t_kegiatan = '/uploads/kegiatan/'.$fileName;
                }
                if($request->foto2){
                    $fileName = time().uniqid() . '.' . $request->foto2->extension();
                    Storage::disk('public')->putFileAs('uploads/kegiatan', $request->foto2, $fileName);
                    $data->foto_proses_t_kegiatan = '/uploads/kegiatan/'.$fileName;
                }
                if($request->foto3){
                    $fileName = time().uniqid() . '.' . $request->foto3->extension();
                    Storage::disk('public')->putFileAs('uploads/kegiatan', $request->foto3, $fileName);
                    $data->foto_akhir_t_kegiatan = '/uploads/kegiatan/'.$fileName;
                }
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.kegiatan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table("t_kegiatan as a")
        ->join("j_kegiatan as b", function($join){
            $join->on("b.id_j_kegiatan", "=", "a.id_j_kegiatan");
        })
        ->join("j_satuan as c", function($join){
            $join->on("c.id_j_satuan", "=", "a.id_j_satuan");
        })
        ->select("a.*", "b.nama_j_kegiatan", "c.nama_j_satuan")
        ->where('a.id_t_kegiatan', '=', $id)
        ->first();
        
        return view('page.admin.laporan.kegiatan.show',[
            'data' => $data
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
        $data = DB::table("t_kegiatan as a")
        ->join("j_kegiatan as b", function($join){
            $join->on("b.id_j_kegiatan", "=", "a.id_j_kegiatan");
        })
        ->join("j_satuan as c", function($join){
            $join->on("c.id_j_satuan", "=", "a.id_j_satuan");
        })
        ->select("a.*", "b.nama_j_kegiatan", "c.nama_j_satuan")
        ->where('a.id_t_kegiatan', '=', $id)
        ->first();
        
        $jenis = DB::table('j_kegiatan')->select('*')->orderBy('nama_j_kegiatan','ASC')->get();
        $satuan = DB::table('j_satuan')->select('*')->orderBy('nama_j_satuan','ASC')->get();
        return view('page.admin.laporan.kegiatan.edit',[
            'data' => $data,
            'jenis' => $jenis,
            'satuan' => $satuan
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
