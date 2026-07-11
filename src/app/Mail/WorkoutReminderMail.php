<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class WorkoutReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user,
        public Collection $jadwalHariIni,
    ) {}

    public function envelope(): Envelope
    {
        $hari = $this->jadwalHariIni->first()?->hariJadwal?->nama_hari ?? 'Latihan';

        return new Envelope(
            subject: "🔔 Pengingat Latihan — {$hari}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.workout-reminder',
        );
    }
}
