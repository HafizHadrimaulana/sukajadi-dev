<?php

namespace App\Http\Controllers\Admin\Agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use App\Models\Surat;
use Storage;

class SuratKeputusanController extends Controller
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
            
            $data = DB::table("t_surat as a")
            ->join("j_surat as b", function($join){
                $join->on("b.id_j_surat", "=", "a.id_j_surat");
            })
            ->join("j_tahun as c", function($join){
                $join->on("c.id_j_tahun", "=", "a.id_j_tahun");
            })
            ->select("a.*", "b.nama_j_surat", "c.nama_j_tahun")
            ->where('a.id_j_tahun', $tahun)
            ->where('a.id_j_surat', 3)
            ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) use ($tahun){
                    $btn = '<a class="btn btn-primary btn-sm" href='. route('admin.agenda.surat-masuk.show', ['id' => $row->id_t_surat]) .'><i class="fa fa-list"></i> Detail</a>';
                    return $btn; 
                })
                ->rawColumns(['action']) 
                ->make(true);
        }
        return view('page.admin.agenda.surat_keputusan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.admin.agenda.surat_keputusan.create');
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
            'tgl' => 'required',
            'tgl_surat' => 'required',
            'nomor_surat' => 'required',
            'asal' => 'required',
        ];

        $pesan = [
            'tgl.required' => 'Tanggal Terima Wajib Diisi!',
            'nomor_surat.required' => 'Nomor Surat Wajib Diisi!',
            'tgl_surat.required' => 'Tanggal Surat Wajib Diisi!',
            'asal.required' => 'Asal Surat Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                $tgl = Carbon::parse($request->tgl);

                $tahun = DB::table('j_tahun')->where('nama_j_tahun', $tgl->format('Y'))->first();

                $data = new Surat();
                $data->id_j_tahun = $tahun->id_j_tahun;
                $data->id_j_surat = 3;
                $data->tanggal_t_surat = $request->tgl;
                $data->tanggal_surat_t_surat = $request->tgl_surat;
                $data->nomor_urut_t_surat = $request->nomor_urut;
                $data->no_t_surat = $request->nomor_surat;
                $data->dari_kepada_t_surat = $request->asal;
                $data->perihal_t_surat = $request->perihal;
                $data->isi_t_surat = $request->keterangan;
                $data->disposisi_t_surat = $request->disposisi;
                $data->user_id = auth()->user()->id;

                if($request->file){
                    $fileName = time().uniqid() . '.' . $request->file->extension();
                    Storage::disk('public')->putFileAs('uploads/surat-masuk', $request->file, $fileName);
                    $data->file_t_surat = '/uploads/surat-masuk/'.$fileName;
                }
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.agenda.surat-masuk.index');
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

        $data = Surat::where('id_t_surat', $id)->first();

        return view('page.admin.agenda.surat_keputusan.show',[
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
        $data = Surat::where('id_t_surat', $id)->first();

        return view('page.admin.agenda.surat_keputusan.edit',[
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
            'tgl' => 'required',
            'tgl_surat' => 'required',
            'nomor_surat' => 'required',
            'asal' => 'required',
        ];

        $pesan = [
            'tgl.required' => 'Tanggal Terima Wajib Diisi!',
            'nomor_surat.required' => 'Nomor Surat Wajib Diisi!',
            'tgl_surat.required' => 'Tanggal Surat Wajib Diisi!',
            'asal.required' => 'Asal Surat Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                $tgl = Carbon::parse($request->tgl);

                $tahun = DB::table('j_tahun')->where('nama_j_tahun', $tgl->format('Y'))->first();

                $data = Surat::where('id_t_surat', $id)->first();
                $data->id_j_tahun = $tahun->id_j_tahun;
                $data->id_j_surat = 3;
                $data->tanggal_t_surat = $request->tgl;
                $data->tanggal_surat_t_surat = $request->tgl_surat;
                $data->nomor_urut_t_surat = $request->nomor_urut;
                $data->no_t_surat = $request->nomor_surat;
                $data->dari_kepada_t_surat = $request->asal;
                $data->perihal_t_surat = $request->perihal;
                $data->disposisi_t_surat = $request->disposisi;
                $data->isi_t_surat = $request->keterangan;
                $data->user_id = auth()->user()->id;

                if($request->file){
                    $fileName = time().uniqid() . '.' . $request->file->extension();
                    Storage::disk('public')->putFileAs('uploads/surat-masuk', $request->file, $fileName);
                    $data->file_t_surat = '/uploads/surat-masuk/'.$fileName;
                }
                $data->save();

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.agenda.surat-masuk.index');
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
