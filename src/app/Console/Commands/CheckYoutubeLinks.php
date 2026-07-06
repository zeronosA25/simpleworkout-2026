<?php

namespace App\Console\Commands;

use App\Mail\BrokenLinkMail;
use App\Models\PengaturanWebsite;
use App\Models\Workout;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckYoutubeLinks extends Command
{
    protected $signature = 'workout:check-youtube-links';

    protected $description = 'Periksa seluruh link YouTube yang tersimpan dan kirim notifikasi jika ditemukan link rusak';

    protected array $brokenLinks = [];

    public function handle(): int
    {
        $workouts = Workout::whereNotNull('video_url')
            ->where('video_url', '!=', '')
            ->where('is_published', true)
            ->get();

        $this->info("Memeriksa {$workouts->count()} link YouTube...");

        foreach ($workouts as $workout) {
            $url = $workout->video_url;

            try {
                $response = Http::timeout(10)->head($url);

                if ($response->failed()) {
                    $this->brokenLinks[] = [
                        'id' => $workout->id,
                        'title' => $workout->title,
                        'video_url' => $url,
                        'status' => $response->status(),
                    ];
                    $this->warn("Rusak: {$workout->title} - {$url} (HTTP {$response->status()})");
                } else {
                    $this->line("OK: {$workout->title}");
                }
            } catch (\Exception $e) {
                $this->brokenLinks[] = [
                    'id' => $workout->id,
                    'title' => $workout->title,
                    'video_url' => $url,
                    'status' => 'Error: ' . $e->getMessage(),
                ];
                $this->error("Error: {$workout->title} - {$url} ({$e->getMessage()})");
            }
        }

        if (count($this->brokenLinks) > 0) {
            $this->sendNotifications();
            $this->error('Ditemukan ' . count($this->brokenLinks) . ' link YouTube yang rusak.');
        } else {
            $this->info('Semua link YouTube dalam kondisi baik.');
        }

        return Command::SUCCESS;
    }

    protected function sendNotifications(): void
    {
        $pengaturan = PengaturanWebsite::first();
        $adminEmail = $pengaturan?->email_admin ?? config('mail.from.address');

        if (!empty($adminEmail)) {
            try {
                Mail::to($adminEmail)->send(new BrokenLinkMail($this->brokenLinks));
                $this->info("Notifikasi email dikirim ke: {$adminEmail}");
            } catch (\Exception $e) {
                Log::error('Gagal mengirim notifikasi email link rusak: ' . $e->getMessage());
                $this->error('Gagal mengirim email: ' . $e->getMessage());
            }
        } else {
            Log::warning('Tidak dapat mengirim notifikasi: email admin tidak dikonfigurasi', $this->brokenLinks);
        }

        Log::channel('single')->warning(
            'Link YouTube rusak terdeteksi',
            ['total' => count($this->brokenLinks), 'links' => $this->brokenLinks]
        );
    }
}
