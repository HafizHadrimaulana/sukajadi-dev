<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Warga;

class RegisterController extends Controller
{

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        
        $kelurahan = DB::table('j_kelurahan')->select('*')->orderBy('id_j_kelurahan', 'DESC')->get();

        return view('page.publik.auth.register',[
            'kelurahan' => $kelurahan
        ]);
    }


    public function register(Request $request)
    {
        $rules = [
            'nik' => 'required',
            'nama' => 'required',
            'email' => 'email|required|unique:warga,email',
            'password' => 'required|min:6',
            'kelurahan' => 'required'
        ];

        $pesan = [
            'nik.required' => 'NIK Wajib Diisi!',
            'nama.required' => 'Nama Lengkap Wajib Diisi!',
            'email.required' => 'Alamat Email Wajib Diisi!',
            'email.unique' => 'Alamat Email Sudah Terdaftar!',
            'email.email' => 'Alamat Email Tidak Valid!',
            'kelurahan.required' => 'Kelurahan Wajib Diisi!',
            'password.required' => 'Password Wajib Diisi!',
            'password.min' => 'Tidak Boleh Kurang Dari 6 Karakter!',
            'password.same' => 'Konfirmasi Password Tidak Sama!',
            'password_conf.min' => 'Tidak Boleh Kurang Dari 6 Karakter!'
        ];

        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }else{
            DB::beginTransaction();
            try{
                $data = new Warga;
                $data->nik = $request->nik;
                $data->nama = $request->nama;
                $data->email = $request->email;
                $data->hp = $request->hp;
                $data->alamat = $request->alamat;
                $data->rt = $request->rt;
                $data->rw = $request->rw;
                $data->kelurahan_id = $request->kelurahan;
                $data->password = Hash::make($request->password);
                $data->save();

                $data->sendEmailVerificationNotification();

            }catch(\QueryException $e){
                DB::rollback();
                return back();
            }
            
            DB::commit();
            // return redirect()->route('home');
            return redirect()->back()->withInput();
        }
    }
}
