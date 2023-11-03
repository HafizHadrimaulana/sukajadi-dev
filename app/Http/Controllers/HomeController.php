<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
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
             return view('home');
         }
         
         // Return view home sebagai default
         return view('home');
     }     

    public function profile()
    {
        return view('page.admin.profile');
    }

    public function dataKegiatan()
    {
        return view('page.admin.dataKegiatan');
    }

    public function inputLaporan()
    {
        return view('page.admin.laporan.inputLaporan');
    }

    public function permasalahanLaporan()
    {
        return view('page.admin.laporan.permasalahan');
    }

    public function kalender()
    {
        return view('page.admin.agenda.kalender');
    }

    public function suratMasuk()
    {
        return view('page.admin.agenda.suratMasuk');
    }
    
    public function suratKeluar()
    {
        return view('page.admin.agenda.suratKeluar');
    }

    public function suratKeputusan()
    {
        return view('page.admin.agenda.suratKeputusan');
    }

    public function cetakLaporanagenda()
    {
        return view('page.admin.agenda.cetak.cetak-laporan-agenda');
    }

    public function cetakLaporansuratmasuk()
    {
        return view('page.admin.agenda.cetak.cetak-laporan-surat-masuk');
    }

    public function cetakLaporansuratkeluar()
    {
        return view('page.admin.agenda.cetak.cetak-laporan-surat-keluar');
    }

    public function cetakLaporansuratkeputusan()
    {
        return view('page.admin.agenda.cetak.cetak-laporan-surat-keputusan');
    }
    public function mitra()
    {
        return view('page.admin.data.mitra');
    }
    public function mediaSosial()
    {
        return view('page.admin.data.mediaSosial');
    }
    public function pegawai()
    {
        return view('page.admin.data.pegawai');
        
    }
    public function penghargaan()
    {
        return view('page.admin.data.penghargaan');
    }
    public function saranaDanprasarana()
    {
        return view('page.admin.data.saranaDanprasarana');
    }
    public function usaha()
    {
        return view('page.admin.data.usaha');
    }
    public function unggulan()
    {
        return view('page.admin.data.unggulan');
    }
    public function pkl()
    {
        return view('page.admin.data.pkl');
    }
    public function pkb()
    {
        return view('page.admin.layanan.pkb');
    }
    public function pbb()
    {
        return view('page.admin.layanan.pbb');
    }
    public function dataWarga()
    {
        return view('page.admin.layanan.dataWarga');
    }
    public function rembugWargaadmin()
    {
        return view('page.admin.aspirasi.rembugWargaadmin');
    }
    public function matrixPippk()
    {
        return view('page.admin.aspirasi.matrixPippk');
    }
    public function file()
    {
        return view('page.admin.dokumen.file');
    }
    public function link()
    {
        return view('page.admin.dokumen.link');
    }
    public function pemberitahuan()
    {
        return view('page.admin.pemberitahuan');
    }
    public function tahun()
    {
        return view('page.admin.pengaturan.tahun');
    }
    public function bulan()
    {
        return view('page.admin.pengaturan.bulan');
    }
    public function tahunAnggaran()
    {
        return view('page.admin.pengaturan.tahunAnggaran');
    }
    public function updateprofile(Request $request)
    {
        $usr = User::findOrFail(Auth::user()->id);
        if ($request->input('type') == 'change_profile') {
            $this->validate($request, [
                'name' => 'string|max:200|min:3',
                'email' => 'string|min:3|email',
                'user_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024'
            ]);
            $img_old = Auth::user()->user_image;
            if ($request->file('user_image')) {
                # delete old img
                if ($img_old && file_exists(public_path().$img_old)) {
                    unlink(public_path().$img_old);
                }
                $nama_gambar = time() . '_' . $request->file('user_image')->getClientOriginalName();
                $upload = $request->user_image->storeAs('public/admin/user_profile', $nama_gambar);
                $img_old = Storage::url($upload);
            }
            $usr->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'user_image' => $img_old
                ]);
            return redirect()->route('profile')->with('status', 'Perubahan telah tersimpan');
        } elseif ($request->input('type') == 'change_password') {
            $this->validate($request, [
                'password' => 'min:8|confirmed|required',
                'password_confirmation' => 'min:8|required',
            ]);
            $usr->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->route('profile')->with('status', 'Perubahan telah tersimpan');
        }
    }
}
