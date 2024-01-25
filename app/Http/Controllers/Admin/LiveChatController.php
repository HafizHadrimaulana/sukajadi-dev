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

class LiveChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('page.admin.livechat.index');
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

        return view('page.admin.livechat.create',[
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
