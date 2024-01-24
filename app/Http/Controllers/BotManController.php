<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('Mulai', function (BotMan $bot) {
            $lastAccessTime = cache()->get('last_access_time');
            $currentTime = now();

            if ($lastAccessTime && $currentTime->diffInSeconds($lastAccessTime) > 5) {
                // Reset state atau mulai percakapan baru
            }
            cache()->put('last_access_time', $currentTime);
            $question = Question::create('Apa yang Anda ingin tanyakan?')
                ->fallback('Tidak dapat memilih pertanyaan')
                ->callbackId('ask_reason')
                ->addButtons([
                    Button::create('1. Pembuatan KTP')->value('ktp'),
                    Button::create('2. Pembuatan KK')->value('kk'),
                    Button::create('3. Pengurusan surat pindah masuk atau keluar')->value('pindah'),
                    Button::create('4. Pengurusan akta kelahiran atau kematian')->value('akta'),
                    Button::create('5. Pengurusan surat izin usaha (untuk pedagang atau usaha kecil)')->value('izin'),
                    // ... tambah tombol lainnya
                ]);

            $bot->ask($question, function ($answer) {
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue();  // Mendapatkan nilai dari tombol yang dipilih

                    switch ($selectedValue) {
                        case 'ktp':
                            $this->say('Untuk pembuatan KTP di kecamatan, Anda perlu menyiapkan fotokopi Kartu Keluarga, Surat Pengantar dari RT/RW, dan Akta Kelahiran atau dokumen pengganti. Setelah itu, kunjungi kantor kecamatan untuk mengajukan permohonan dan mengikuti proses administratif yang ditetapkan.');
                            break;
                        case 'kk':
                            $this->say('Untuk membuat Kartu Keluarga (KK) di kecamatan, siapkan dokumen seperti Akta Kelahiran, Surat Nikah, dan KTP, lalu ajukan permohonan di kantor kecamatan.');
                            break;
                        case 'pindah':
                             $this->say('Untuk pengurusan surat pindah masuk atau keluar di kecamatan, siapkan dokumen yang diperlukan seperti KTP, KK, dan Surat Pengantar RT/RW, lalu ajukan permohonan di kantor kecamatan.');
                             break;
                         case 'akta':
                             $this->say('
                             Untuk pengurusan akta kelahiran atau kematian di kecamatan, bawa dokumen seperti surat keterangan kelahiran atau kematian dari rumah sakit atau dokter, KTP orang tua atau pelapor, dan KK, lalu ajukan di kantor kecamatan.');
                             break;
                         case 'izin':
                             $this->say('Untuk mengurus surat izin usaha di kecamatan bagi pedagang atau pemilik usaha kecil, Anda perlu menyiapkan beberapa dokumen. Pertama, siapkan fotokopi Kartu Tanda Penduduk (KTP) dan Kartu Keluarga (KK) Anda. Kedua, buatlah proposal usaha yang menjelaskan jenis dan skala bisnis yang akan Anda jalankan. Setelah dokumen lengkap, ajukan permohonan surat izin usaha ke kantor kecamatan setempat. Proses ini akan melibatkan verifikasi dokumen dan mungkin beberapa tahapan administratif tambahan sesuai kebijakan kecamatan.');
                             break;

                        // ... tambah kasus lainnya
                    }
                }
            });
        });

        $botman->hears('Halo', function (BotMan $bot) {
            $bot->reply('Halo juga!');
        });

        $botman->hears('Apa kabar?', function (BotMan $bot) {
            $bot->reply('Saya adalah bot, saya selalu baik-baik saja! Bagaimana dengan Anda?');
        });

        $botman->hears('Siapa nama Anda?', function (BotMan $bot) {
            $bot->reply('Saya adalah BotMan. Bagaimana saya bisa membantu Anda hari ini?');
        });

        $botman->hears(['tolong', 'tolong bantu saya', 'bantu saya'], function (BotMan $bot) {
            $bot->startConversation(new BantuanConversation());
        });

        $botman->fallback(function (BotMan $bot) {
            $bot->reply('Maaf, saya tidak mengerti pesan Anda. Silakan coba lagi atau tanyakan sesuatu yang lain.');
        });

        $botman->listen();
    }
}