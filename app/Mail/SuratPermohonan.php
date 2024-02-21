<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class SuratPermohonan extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $file)
    {
        $this->data = $data;
        $this->file = $file;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        
        if($this->data->kategori == 'ktp'){
            $title = 'Surat Pengantar KTP';
        }elseif($this->data->kategori == 'kk'){
            $title = 'Surat Pengantar KK';
        }elseif($this->data->kategori == 'pindah'){
            $title = 'Surat Pengantar Pindah/Masuk';
        }elseif($this->data->kategori == 'usaha'){
            $title = 'Surat Pengantar Izin Usaha';
        }else{
            $title = 'Surat Pengantar Domisili';
        }

        return new Envelope(
            subject: 'Permohonan '. $title,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.permohonan',
            with : [
                'data' => $this->data,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        
        if($this->data->kategori == 'ktp'){
            $fileName = 'Surat Pengantar KTP.pdf';
        }elseif($this->data->kategori == 'kk'){
            $fileName = 'Surat Pengantar KK.pdf';
        }elseif($this->data->kategori == 'pindah'){
            $fileName = 'Surat Pengantar Pindah-Masuk.pdf';
        }elseif($this->data->kategori == 'usaha'){
            $fileName = 'Surat Pengantar Izin Usaha.pdf';
        }else{
            $fileName = 'Surat Pengantar Domisili.pdf';
        }
        // $fileName = 'pengantar.pdf';

        return [
            Attachment::fromData(fn () => $this->file, $fileName)
                    // ->as($fileName)
                    ->withMime('application/pdf'),
        ];
    }
}
