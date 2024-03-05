<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Events\ChatUpdate;
use App\Events\SendMessage;


use App\Models\Chat;
use App\Models\Message;

class ChatController extends Controller
{   

    public function create(Request $request)
    {
        DB::beginTransaction();
        try{
            $user = auth()->guard('warga')->user();
            $data = new Chat();
            $data->warga_id = $user->id;
            $data->unseen_messages = 0;
            $data->last_sender = 'warga';
            $data->save();

            $resp = Collect([
                'id' => $data->id,
                'nama' => $user->nama,
                'unseen_messages' => 0,
                'last_sender' => 'warga'
            ]);

        }catch(\QueryException $e){
            DB::rollback();
            return response()->json([
                'fail' => true,
                'msg' => $e,
            ]);
        }
        DB::commit();
        return response()->json($resp, 200);
    }

    public function message(Request $request)
    {
        
        $messages = Message::where('chat_id', $request->chat_id)->orderBy('created_at', 'asc')->get();
        foreach($messages as $message){
            $message->is_seen = 1;
            $message->save();
        }
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        event(new ChatUpdate($chats));
        
        return response()->json($messages, 200);
    }

    public function send(Request $request)
    {
        
        $message = Message::create([
            'chat_id' => $request->chat_id,
            'type'    => 'text',
            'pesan' => $request->message,
            'is_seen' => 0,
            'sender'  => $request->sender
        ]);
        // dd($message);
        event(new SendMessage($message));

        if($message->sender == 'warga'){
            $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
            event(new ChatUpdate($message));
        }
        
        return response($message, 200);
    }


    public function bot(Request $request)
    {
        
        if($request->ask == 'kk'){
            $ask = 'Bagaimana cara pembuatan kartu keluarga?';

            $ans = 'Untuk membuat kartu keluarga kamu harus menyiapkan dulu dokumen persayaratan berikut ini
            <br>
            <ol>
                <li>Isian formulir permohonan KK</li>
                <li>KK lama, Surat keterangan kehilangan dari Kepolisian jika KK hilang dan/atau SKDWNI</li>
                <li>Dokumen pendukung apabila ada perubahan data, yang meliputi akta kelahiran, ijazah, surat nikah atau akta-akta pencatatan sipil lainnya, keputusan pengadilan, surat keterangan, dan/atau surat pernyataan.</li>
                <li>Alamat E-mail aktif</li>
            </ol>
            Kemudian datangi kantor kantor kecamatan untuk penerbitan<br>
            <a href="'. route('pengantar.create', 'kk') .' class="btn btn-primary btn-sm mt-2">Ajukan Surat Pengantar</a>
            '
            ;
        }else if($request->ask == 'ktp'){
            $ask = 'Bagaimana cara pembuatan KTP?';

            $ans = '
                Berikut ini adalah syarat untuk membuat KTP baru<br>
                <ol><li>Telah berusia 17 tahun, sudah kawin, atau pernah kawin; dan</li><li>Fotokopi KK.&nbsp;</li><li>Dasar Hukum Pasal 15 Perpres 96/2018</li></ol>
                Jika Persyaratan tersebut terpenuhi kamu bisa langsung mendatangi kantor kecamatan
                <a href="'. route('pengantar.create', 'ktp') .' class="btn btn-primary btn-sm mt-2">Ajukan Surat Pengantar</a>
            ';
        }else if($request->ask == 'surat-pindah-masuk'){
            $ask = 'Bagaimana cara pembuatan surat pindah/masuk ?';

            $ans = 'Proses pengurusan surat pindah dan surat masuk di kantor kecamatan biasanya melibatkan langkah-langkah berikut:<br>

            <ul>
                <li>Persiapan Dokumen: Pastikan Anda memiliki dokumen-dokumen yang diperlukan, seperti Kartu Keluarga (KK), KTP, surat keterangan domisili, dan dokumen identifikasi lainnya.</li>
                <li>Kunjungi Kantor Kecamatan: Datanglah ke kantor kecamatan di wilayah tempat Anda tinggal saat ini untuk mengurus surat pindah, atau ke kantor kecamatan di wilayah tempat Anda akan pindah untuk mengurus surat masuk</li>
                <li>Isi Formulir Permohonan: Anda akan diminta untuk mengisi formulir permohonan surat pindah atau surat masuk. Pastikan untuk melengkapi formulir dengan benar dan lengkap.</li>
                <li>Serahkan Dokumen: Serahkan formulir permohonan dan dokumen-dokumen yang diperlukan kepada petugas yang bertugas di kantor kecamatan.</li>
                <li>Proses Verifikasi: Petugas akan melakukan verifikasi terhadap dokumen-dokumen yang Anda berikan untuk memastikan keabsahan dan kelengkapan informasinya.</li>
                <li>Ambil Surat: Setelah proses verifikasi selesai, Anda dapat mengambil surat pindah atau surat masuk Anda di kantor kecamatan tersebut.</li>
            </ul>
            Pastikan untuk menanyakan persyaratan yang spesifik dan prosedur yang berlaku di kantor kecamatan yang Anda kunjungi, karena prosesnya bisa sedikit berbeda tergantung pada daerahnya.
            <a href="'. route('pengantar.create', 'pindah') .' class="btn btn-primary btn-sm mt-2">Ajukan Surat Pengantar</a>
            ';
        }else if($request->ask == 'akta-kelahiran'){
            $ask = 'Bagaimana cara pembuatan akta kelahiran ?';

            $ans = 'Untuk pengurusan akta kelahiran di kantor kecamatan: <br/>
            <ul>
                <li>Siapkan dokumen yang diperlukan, seperti bukti kelahiran.</li>
                <li>Kunjungi kantor kecamatan tempat kelahiran terjadi.</li>
                <li>Isi formulir permohonan.<li>
                <li>Serahkan dokumen dan formulir kepada petugas.</li>
                <li>Tunggu proses verifikasi</li>
            </ul>
            Setelah itu ambil akta kelahiran setelah selesai verifikasi.
            ';
        }else if($request->ask == 'pengurusan-izin-usaha'){
            $ask = 'Bagaimana cara pembuatan surat izin usaha ?';

            $ans = 'Berikut adalah langkah-langkah singkat untuk pengurusan surat izin usaha di kantor kecamatan: <br/>
            <ol>
                <li>Siapkan dokumen-dokumen yang diperlukan.</li>
                <li>Kunjungi kantor kecamatan di wilayah tempat usaha akan beroperasi.</li>
                <li>Isi formulir permohonan izin usaha.</li>
                <li>Serahkan formulir dan dokumen-dokumen pendukung kepada petugas</li>
                <li>Tunggu proses verifikasi</li>
            </ol>
            Setelah itu ambil surat izin usaha setelah disetujui.
            <a href="'. route('pengantar.create', 'usaha') .' class="btn btn-primary btn-sm mt-2">Ajukan Surat Pengantar</a>
            ';
        }


        $message = Message::create([
            'chat_id' => $request->chat_id,
            'type'    => 'text',
            'pesan' => $ask,
            'is_seen' => 1,
            'sender'  => 'warga'
        ]);

        $reply = Message::create([
                'chat_id' => $request->chat_id,
                'type'    => 'text',
                'pesan' => $ans,
                'is_seen' => 0,
                'sender'  => 'admin'
        ]);

        event(new SendMessage($message));
        event(new SendMessage($reply));
        $chats = Chat::withCount('unseen_messages')->orderBy('unseen_messages_count', 'desc')->paginate(10);
        event(new ChatUpdate($message));
        
        return response($message, 200);
    }
}