<?php

namespace App\Livewire;

use App\Mail\NewSaranKritikMail;
use App\Models\PengaturanWebsite;
use App\Models\SaranKritik;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class SaranForm extends Component
{
    public string $kategori = '';

    public string $pesan = '';

    public bool $submitted = false;

    public string $successMessage = '';

    protected function rules(): array
    {
        return [
            'kategori' => 'required|in:Teknis,Kritik Video/Deskripsi,Saran Gerakan Baru',
            'pesan' => 'required|string|min:10|max:2000',
        ];
    }

    protected function messages(): array
    {
        return [
            'kategori.required' => 'Pilih kategori terlebih dahulu.',
            'kategori.in' => 'Kategori tidak valid.',
            'pesan.required' => 'Pesan tidak boleh kosong.',
            'pesan.min' => 'Pesan minimal 10 karakter.',
            'pesan.max' => 'Pesan maksimal 2000 karakter.',
        ];
    }

    public function updatedPesan(): void
    {
        $this->validateOnly('pesan');
        $this->submitted = false;
        $this->successMessage = '';
    }

    public function submit(): void
    {
        $validated = $this->validate();

        $saran = SaranKritik::create([
            'user_id' => auth()->id(),
            'kategori' => $validated['kategori'],
            'pesan' => $validated['pesan'],
            'status' => 'Pending',
        ]);

        $pengaturan = PengaturanWebsite::first();
        $adminEmail = $pengaturan?->email_admin ?? config('mail.from.address');

        if (! empty($adminEmail)) {
            try {
                Mail::to($adminEmail)->send(new NewSaranKritikMail($saran));
            } catch (\Exception $e) {
                report($e);
            }
        }

        $this->reset(['kategori', 'pesan']);
        $this->submitted = true;
        $this->successMessage = 'Pesan Anda telah berhasil dikirim dan akan diproses oleh Admin.';
    }

    public function render()
    {
        return view('livewire.saran-form');
    }
}
