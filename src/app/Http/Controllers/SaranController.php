<?php

namespace App\Http\Controllers;

use App\Mail\NewSaranKritikMail;
use App\Models\PengaturanWebsite;
use App\Models\SaranKritik;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class SaranController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kategori' => 'required|in:Teknis,Kritik Video/Deskripsi,Saran Gerakan Baru',
            'pesan' => 'required|string|min:10|max:2000',
        ]);

        $saran = SaranKritik::create([
            'user_id' => auth()->id(),
            'kategori' => $validated['kategori'],
            'pesan' => $validated['pesan'],
            'status' => 'Pending',
        ]);

        $pengaturan = PengaturanWebsite::first();
        $adminEmail = $pengaturan?->email_admin ?? config('mail.from.address');

        if (!empty($adminEmail)) {
            try {
                Mail::to($adminEmail)->send(new NewSaranKritikMail($saran));
            } catch (\Exception $e) {
                report($e);
            }
        }

        return redirect()->route('faq.index', ['#kirim-saran'])
            ->with('success', 'Pesan Anda telah berhasil dikirim dan akan diproses oleh Admin.');
    }
}
