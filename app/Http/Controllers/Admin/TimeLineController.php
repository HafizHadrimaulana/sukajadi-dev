<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use App\Models\TimeLine;
use App\Models\TimeLineFoto;
use Illuminate\Support\Str;

use Storage;
class TimeLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // $data = Timeline::with(['foto'])
        // ->join("j_kegiatan as b", function($join){
        //     $join->on("b.id_j_kegiatan", "=", "t_p_kegiatan.id_j_kegiatan");
        // })
        // ->select("t_p_kegiatan.*", "b.nama_j_kegiatan")
        // ->orderBy('id', 'DESC')
        // ->get(1);
        // dd($data);
        if ($request->ajax()) {
            
            $tahun = $request->tahun;
            $bulan = $request->bulan;
            $sopd = $request->sopd;
            
            $data = Timeline::with(['foto'])
            ->join("j_kegiatan as b", function($join){
                $join->on("b.id_j_kegiatan", "=", "t_p_kegiatan.id_j_kegiatan");
            })
            ->select("t_p_kegiatan.*", "b.nama_j_kegiatan")
            ->orderBy('id', 'DESC')
            ->get();
            
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    // $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.timeline.show', $row->id) .'><i class="fa fa-list"></i> Detail</a>';
                    // return $btn; 
                    // $btn 
                    $btn = '<div class="dropdown">
                    <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-list mr-1"></i> Aksi
                    </a>';
                  
                    $btn .= '<div class="dropdown-menu dropdown-menu-right">';
                    $btn .= '<a class="dropdown-item" href="'. route('admin.timeline.show', $row->id) .'"><i class="fa fa-eye mr-1"></i>Detail</a>';
                    $btn .= '<a class="dropdown-item" href="'. route('admin.timeline.edit', $row->id) .'"><i class="fa fa-edit mr-1"></i>Ubah</a>';
                    $btn .= '<a class="dropdown-item" href="#"><i class="fa fa-trash mr-1"></i>Hapus</a>';
                    $btn .= '<a class="dropdown-item open-map" href="#" data-lat="'. $row->lat_kegiatan.'" data-lng="'. $row->lng_kegiatan .'"><i class="fa fa-map mr-1"></i>Lihat Lokasi</a>';
                    $btn .= '</div>';
                    $btn .= '</div>';

                    return $btn;

                })
                ->addColumn('nama_kegiatan', function($row){
                    return Str::limit($row->nama_kegiatan, 200); 
                })
                ->addColumn('foto', function($row){

                    if(count($row->foto)){
                        $foto = '/storage'.$row->foto[0]->nama_foto;
                    }else{
                        $foto = '';
                    }
                    $btn = '<img src="'. $foto .'" style="width:120px;"/>';
                    return $btn; 
                })
                ->rawColumns(['action', 'foto', 'nama_kegiatan']) 
                ->make(true);
        }
        return view('page.admin.timeline.index');
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

        return view('page.admin.timeline.create',[
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
            'jenis_kegiatan' => 'required',
            'keterangan' => 'required',
        ];

        $pesan = [
            'jenis_kegiatan.required' => 'Jenis Kegiatan Wajib Diisi!',
            'keterangan.required' => 'Keterangan Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                $tgl = Carbon::today();

                $data = new TimeLine();
                $data->tanggal_kegiatan = $tgl->format('Y-m-d');
                $data->jam_kegiatan = $tgl->format('H:i');
                $data->id_j_kegiatan = $request->jenis_kegiatan;
                $data->nama_kegiatan = $request->keterangan;
                $data->lokasi_kegiatan = $request->alamat;
                $data->lat_kegiatan = $request->lat;
                $data->lng_kegiatan = $request->lng;
                $data->status_kegiatan = ($request->status_kegiatan) ? 1  : 0;
                $data->id_user = auth()->user()->id;
                $data->save();
                if(count($request->foto)){
                    foreach($request->foto as $f){
                        
                        $fileName = time().uniqid() . '.' . $f->extension();
                        Storage::disk('public')->putFileAs('uploads/timeline', $f, $fileName);

                        $foto = new TimeLineFoto();
                        $foto->id_user = auth()->user()->id;
                        $foto->nama_foto = '/uploads/timeline/'.$fileName;
                        // $foto->size = $f->size();
                        $data->foto()->save($foto);
                    }

                }

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.timeline.index');
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
        $data = Timeline::with('foto')->where('id', $id)->first();
        // dd($data);
        return view('page.admin.timeline.show',[
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
        $data = Timeline::with('foto')->where('id', $id)->first();
        $fotoArray = [];
        foreach($data->foto as $f){
            $fotoArray[] = $f->nama_foto;
        }
        // dd($fotoArray);
        $data->fotoArray = json_encode($fotoArray);

        $jenis = DB::table('j_kegiatan')->select('*')->orderBy('nama_j_kegiatan','ASC')->get();
        $satuan = DB::table('j_satuan')->select('*')->orderBy('nama_j_satuan','ASC')->get();

        return view('page.admin.timeline.edit',[
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
        $rules = [
            'jenis_kegiatan' => 'required',
            'keterangan' => 'required',
        ];

        $pesan = [
            'jenis_kegiatan.required' => 'Jenis Kegiatan Wajib Diisi!',
            'keterangan.required' => 'Keterangan Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                $tgl = Carbon::today();

                $data = TimeLine::where('id', $id)->first();
                $data->tanggal_kegiatan = $tgl->format('Y-m-d');
                $data->jam_kegiatan = $tgl->format('H:i');
                $data->id_j_kegiatan = $request->jenis_kegiatan;
                $data->nama_kegiatan = $request->keterangan;
                $data->lokasi_kegiatan = $request->alamat;
                $data->lat_kegiatan = $request->lat;
                $data->lng_kegiatan = $request->lng;
                $data->status_kegiatan = ($request->status_kegiatan) ? 1  : 0;
                $data->id_user = auth()->user()->id;
                $data->save();
                if(count($request->foto)){
                    foreach($request->foto as $f){
                        
                        $fileName = time().uniqid() . '.' . $f->extension();
                        Storage::disk('public')->putFileAs('uploads/timeline', $f, $fileName);

                        $foto = new TimeLineFoto();
                        $foto->id_user = auth()->user()->id;
                        $foto->nama_foto = '/uploads/timeline/'.$fileName;
                        $data->foto()->save($foto);
                    }

                }

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.timeline.index');
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
}
