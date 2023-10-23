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
            $question = Question::create('Apa yang Anda ingin tanyakan?')
                ->fallback('Tidak dapat memilih pertanyaan')
                ->callbackId('ask_reason')
                ->addButtons([
                    Button::create('Siapa nama Anda?')->value('name'),
                    Button::create('Apa kabar?')->value('status'),
                    // ... tambah tombol lainnya
                ]);

            $bot->ask($question, function ($answer) {
                if ($answer->isInteractiveMessageReply()) {
                    $selectedValue = $answer->getValue();  // Mendapatkan nilai dari tombol yang dipilih

                    switch ($selectedValue) {
                        case 'name':
                            $this->say('Saya adalah BotMan. Bagaimana saya bisa membantu Anda hari ini?');
                            break;
                        case 'status':
                            $this->say('Saya adalah bot, saya selalu baik-baik saja! Bagaimana dengan Anda?');
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

class BantuanConversation extends Conversation
{
    public function run()
    {
        $this->ask('Silakan tulis permintaan Anda, misalnya "pembuatan KTP" atau "pembuatan SIM".', function ($answer) {
            $request = strtolower($answer->getText());
    
            if (strpos($request, 'pembuatan ktp') !== false) {
                $this->say('Untuk pembuatan KTP, Anda perlu mengunjungi kantor kependudukan setempat dan membawa dokumen-dokumen yang diperlukan.');
                $this->askConfirmation('pembuatan KTP');
            } elseif (strpos($request, 'pembuatan sim') !== false) {
                $this->say('Untuk pembuatan SIM, Anda perlu pergi ke kantor polisi setempat dan mengikuti prosedur pendaftaran.');
                $this->askConfirmation('pembuatan SIM');
            } else {
                $this->say('Maaf, saya tidak memiliki informasi tentang permintaan tersebut. Silakan coba lagi atau tanyakan sesuatu yang lain.');
                $this->repeat();
            }
        });
    }
    
    public function askConfirmation($previousRequest)
    {
        $this->ask("Apakah Anda sudah mengerti cara $previousRequest?", function ($answer) use ($previousRequest) {
            $confirmation = strtolower($answer->getText());
    
            if ($confirmation === 'sudah' || $confirmation === 'sudah terimakasih') {
                $this->say('Baiklah, senang bisa membantu Anda :)');
                $this->ask("Apakah Anda masih ada pertanyaan tentang $previousRequest atau ingin tahu sesuatu yang lain?", function ($answer) use ($previousRequest) {
                    // Handle the new answer here. You can repeat the same logic as in run() or call run() again.
                    $newRequest = strtolower($answer->getText());
                    // ... logic for handling $newRequest
                    $this->run();  // Optionally restart the conversation
                });
            } else {
                // If user didn't confirm, you can either repeat the original question or proceed differently.
                $this->repeat();
            }
        });
    }
}
