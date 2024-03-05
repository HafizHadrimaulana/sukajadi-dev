<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('page.publik.auth.login');
    }

    public function login(Request $request)
    {
       $input = $request->all();

       $rules = [
           'email' => 'required|exists:warga,email|string',
           'password' => 'required|string'
       ];

       $pesan = [
           'email.required' => 'Alamat Email Wajib Diisi!',
           'email.exists' => 'Alamat Email Belum Terdaftar!',
           'password.required' => 'Password Wajib Diisi!',
       ];
       $validator = Validator::make($request->all(), $rules, $pesan);
       if ($validator->fails()){
        return redirect()->back()->withInput()->withErrors($validator->errors());
       }else{
            if(auth()->guard('warga')->attempt($request->only('email','password')))
            {
                if(auth()->guard('warga')->user()->hasVerifiedEmail()){
                    return redirect()->route('home');
                }
                return redirect()->route('verification.notice');
            }else{
               $gagal['password'] = array('Password salah!');
               return redirect()->back()->withInput()->withErrors($gagal);
            }
        }

    }

    public function logout()
    {
        Auth::guard('warga')->logout();
        return redirect('/');
    }
}
