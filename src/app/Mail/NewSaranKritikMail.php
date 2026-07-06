<?php

namespace App\Mail;

use App\Models\SaranKritik;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewSaranKritikMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public SaranKritik $saranKritik,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Saran/Kritik Baru: ' . $this->saranKritik->kategori,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.new-saran-kritik',
            with: [
                'saranKritik' => $this->saranKritik,
                'user' => $this->saranKritik->user,
            ],
        );
    }
}
