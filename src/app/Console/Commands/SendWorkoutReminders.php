<?php

namespace App\Console\Commands;

use App\Mail\WorkoutReminderMail;
use App\Models\JadwalPengguna;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWorkoutReminders extends Command
{
    protected $signature = 'workout:send-reminders';

    protected $description = 'Kirim email pengingat latihan ke user yang belum checklist jadwal hari ini';

    public function handle(): int
    {
        $hariKe = now()->dayOfWeekIso;
        $users = User::whereHas('jadwalPengguna', function ($q) use ($hariKe) {
            $q->whereHas('hariJadwal', function ($q) use ($hariKe) {
                $q->where('urutan_hari', $hariKe);
            })->where('is_checked', false);
        })->with(['jadwalPengguna' => function ($q) use ($hariKe) {
            $q->whereHas('hariJadwal', function ($q) use ($hariKe) {
                $q->where('urutan_hari', $hariKe);
            })->where('is_checked', false)
              ->with(['hariJadwal' => function ($q) use ($hariKe) {
                  $q->where('urutan_hari', $hariKe);
              }, 'hariJadwal.detailJadwal' => function ($q) {
                  $q->orderBy('urutan_gerakan');
              }, 'hariJadwal.detailJadwal.workout']);
        }])->get();

        $sent = 0;

        foreach ($users as $user) {
            if (empty($user->email)) continue;

            $hariIni = $user->jadwalPengguna->filter(function ($jp) {
                return ! $jp->is_checked;
            });

            if ($hariIni->isEmpty()) continue;

            try {
                Mail::to($user->email)->send(new WorkoutReminderMail($user, $hariIni));
                $sent++;
            } catch (\Exception $e) {
                $this->warn("Gagal kirim email ke {$user->email}: {$e->getMessage()}");
            }
        }

        $this->info("Pengingat terkirim ke {$sent} user.");

        return self::SUCCESS;
    }
}
