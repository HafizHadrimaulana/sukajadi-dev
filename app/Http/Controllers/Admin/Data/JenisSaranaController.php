<?php

namespace App\Http\Controllers\Admin\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use App\Models\JenisSarpras;
class JenisSaranaController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('page.admin.data.sarpras.jenis_create');
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
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return response()->json([
                'fail' => true,
                'errors' => $validator->errors()
            ]);
        }else{

            DB::beginTransaction();
            try{
                $data = new JenisSarpras();
                $data->nama_j_data_sarpras = $request->nama;
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                return response()->json([
                    'fail' => true,
                    'msg' => $e,
                ]);
            }
            DB::commit();
            return response()->json([
                'fail' => false,
                'data' => $data,
            ], 200);
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
        return view('page.admin.data.sarpras.edit',[
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
}
