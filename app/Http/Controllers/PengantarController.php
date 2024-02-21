<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Pengantar;



class PengantarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.publik.pengantar.index');
    }

    
    public function create($jenis, Request $request)
    {
        $kelurahan = DB::table('j_kelurahan')->select('*')->orderBy('id_j_kelurahan', 'DESC')->get();

        if($jenis == 'ktp'){
            $title = 'KTP';
        }elseif($jenis == 'kk'){
            $title = 'KK';
        }elseif($jenis == 'pindah'){
            $title = 'Pindah / Masuk';
        }elseif($jenis == 'usaha'){
            $title = 'Izin Usaha';
        }elseif($jenis == 'domisili'){
            $title = 'Domisili';
        }

        return view('page.publik.pengantar.create',[
            'title' => $title,
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
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'tmp_lahir.required' => 'Tempat Lahir Wajib Diisi!',
            'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi!',
            'email.required' => 'Alamat Email Wajib Diisi!',
            'alamat.required' => 'Alamat Wajib Diisi!',
            'kelurahan.required' => 'Kelurahan Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                $data = new Pengantar();
                $data->nomor = $this->getNumber();
                $data->kategori = $request->kategori;
                $data->nama = $request->nama;
                $data->tmp_lahir = $request->tmp_lahir;
                $data->tgl_lahir = $request->tgl_lahir;
                $data->jk = $request->jk;
                $data->status_pernikahan = $request->status_pernikahan;
                $data->pekerjaan = $request->pekerjaan;
                $data->agama = $request->agama;
                $data->kewarganegaraan = $request->kewarganegaraan;
                $data->kelurahan_id = $request->kelurahan;
                $data->rt = $request->rt;
                $data->rw = $request->rw;
                $data->alamat = $request->alamat;
                $data->email = $request->email;
                $data->status = 'pending';
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('pengantar.create', $request->kategori);
        }
    }


    private function getNumber()
    {
        $kd = 'PSP';

        $q = Pengantar::select(DB::raw('MAX(RIGHT(nomor,5)) AS kd_max'));
        $no = 1;
        date_default_timezone_set('Asia/Jakarta');

        if($q->count() > 0){
            foreach($q->get() as $k){
                return $kd .'/'.sprintf("%05s", abs(((int)$k->kd_max) + 1));
            }
        }else{
            return $kd.'/'. sprintf("%05s", $no);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function jenis(Request $request)
    {
        
        $term = trim($request->q);
        $jenis = trim($request->jenis);

        if (empty($jenis)) {
            return \Response::json([]);
        }


        // $data = [];
        $data = [['id' => 'semua', 'text' => "Semua"]];

        if($jenis == 'Pegawai'){
            $query = DB::table('j_data_pegawai')->select('*')->orderBy('nama_j_data_pegawai','ASC')->get();
            foreach ($query as $q) {
                $data[] = ['id' => $q->id_j_data_pegawai, 'text' => $q->nama_j_data_pegawai];
            }
        }else if($jenis == 'Usaha'){
            $query = DB::table('j_data_usaha')->select('*')->orderBy('nama_j_data_usaha','ASC')->get();
            foreach ($query as $q) {
                $data[] = ['id' => $q->id_j_data_usaha, 'text' => $q->nama_j_data_usaha];
            }
        }else{
            $query = DB::table('j_data_sarpras')->select('*')->orderBy('nama_j_data_sarpras','ASC')->get();
            foreach ($query as $q) {
                $data[] = ['id' => $q->id_j_data_sarpras, 'text' => $q->nama_j_data_sarpras];
            }
        }

        return \Response::json($data);

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
