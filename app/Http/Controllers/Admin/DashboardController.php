<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Pengajuan;
use App\Models\Message;
use App\Models\Pengantar;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index() {
         // Cek apakah user sudah login
         if (!auth()->check()) {
             return redirect()->route('login');
         }
     
         // User yang telah login
         $user = auth()->user();
     
         // Mendapatkan semua role user yang sedang login
         $userRoles = $user->getRoleNames(); // Menggunakan package spatie/laravel-permission
     
         // Log informasi user yang login
         Log::info('User logged in', ['user_id' => $user->id, 'email' => $user->email, 'roles' => $userRoles->toArray()]);
     
         // Cek apakah user memiliki role 'superadmin' atau 'kecamatan'
         if ($userRoles->contains('superadmin') || $userRoles->contains('kecamatan')) {
             // Tampilkan view untuk halaman akun admin
             return view('page\admin\dashboard');
         }
         
         // Return view home sebagai default
         return view('home');
     }

     public function notif(Request $request)
     {


        $suratMasuk = 0;
        $suratKeluar = 0;

        $pengajuan = Pengajuan::where('status', 'pending')->latest()->get()->count();
        $liveChat = Message::where('is_seen', 0)->latest()->get()->count();
        $surat = Pengantar::where('status', 'pending')->latest()->get()->count();

        $total = $suratMasuk + $suratKeluar + $pengajuan + $liveChat + $surat;

        $data = Collect([
            'surat_masuk' => 0,
            'surat_keluar' => 0,
            'pengajuan' => $pengajuan,
            'livechat' => $liveChat,
            'surat' => $surat,
            'total' => $total
        ]);


        return response()->json($data);
     }
}
