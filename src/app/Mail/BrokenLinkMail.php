<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BrokenLinkMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $brokenLinks,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Peringatan: ' . count($this->brokenLinks) . ' Link YouTube Rusak Terdeteksi',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.broken-link',
            with: [
                'brokenLinks' => $this->brokenLinks,
            ],
        );
    }
}
