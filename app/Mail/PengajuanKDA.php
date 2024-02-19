<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class PengajuanKDA extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $excelFile;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $excelFile)
    {
        $this->data = $data;
        $this->excelFile = $excelFile;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Pengajuan KDA',
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
            markdown: 'emails.pengajuan',
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
        if($this->data->jenis == 'Pegawai'){
            $fileName = 'Data Pegawai.xlsx';
        }else if($this->data->jenis == 'Usaha'){
            $fileName = 'Data Usaha.xlsx';
        }else{
            $fileName = 'Data Sarana & Prasarana.xlsx';
        }

        return [
            Attachment::fromPath($this->excelFile)
                    ->as($fileName)
                    ->withMime('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'),
        ];
    }
}
