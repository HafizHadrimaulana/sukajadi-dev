<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            
            $data = User::with('roles')->latest()->get();
            // dd($data);
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<div class="dropdown">
                    <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-list mr-1"></i> Aksi
                    </a>';
                  
                    $btn .= '<div class="dropdown-menu dropdown-menu-right">';
                    $btn .= '<a class="dropdown-item" href="'. route('admin.akun.edit', $row->id) .'">Ubah</a>';
                    $btn .= '<a class="dropdown-item" href="#" onclick="hapus('. $row->id .')">Hapus</a>';
                    $btn .= '</div>';
                    $btn .= '</div>';
                    return $btn; 
                })
                ->addColumn('role', function($row){
                    return $row->roles[0]->name;
                })
                ->rawColumns(['action', 'role']) 
                ->make(true);
        }

        return view('page.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sopd = DB::table('j_sopd')->select('*')->orderBy('nama_j_sopd','ASC')->get();

        return view('page.admin.user.create',[
            'sopd' => $sopd
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
            'email' => 'required|unique:users,email',
            'role' => 'required',
            'sopd' => 'required',
            'password' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'email.required' => 'Alamat Email Wajib Diisi!',
            'email.unique' => 'Alamat Email Sudah Digunakan!',
            'role.required' => 'Hak Akses Wajib Diisi!',
            'sopd.required' => 'SOPD Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
               
                $data = new User();
                $data->name = $request->nama;
                $data->email = $request->email;
                $data->sopd_id = $request->sopd;
                $data->password = bcrypt($request->password);
                $data->save();

                $data->assignRole($request->role);

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.akun.index');
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
        $sopd = DB::table('j_sopd')->select('*')->orderBy('nama_j_sopd','ASC')->get();
        $data = User::with('roles')->where('id', $id)->first();

        return view('page.admin.user.edit',[
            'sopd' => $sopd,
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
        // dd($request->all());
        $rules = [
            'nama' => 'required',
            'email' => 'required|unique:users,email, '.$id,
            'role' => 'required',
            'sopd' => 'required',
        ];

        $pesan = [
            'nama.required' => 'Nama Wajib Diisi!',
            'email.required' => 'Alamat Email Wajib Diisi!',
            'email.unique' => 'Alamat Email Sudah Digunakan!',
            'role.required' => 'Hak Akses Wajib Diisi!',
            'sopd.required' => 'SOPD Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
               
                $data = User::where('id', $id)->first();
                $data->name = $request->nama;
                $data->email = $request->email;
                $data->sopd_id = $request->sopd;
                if($request->password){
                    $data->password = bcrypt($request->password);
                }
                $data->save();

                $data->syncRoles($request->role);

            }catch(\QueryException $e){
                DB::rollback();
                dd($e);
            }

            DB::commit();
            return redirect()->route('admin.akun.index');
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

            $data = User::where('id', $id)->first();
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
}
