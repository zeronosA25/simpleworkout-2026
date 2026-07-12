<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanWebsite extends Model
{
    protected $table = 'pengaturan_website';

    protected $fillable = [
        'nama_website',
        'logo',
        'favicon',
        'hero_title',
        'hero_subtitle',
        'hero_background_url',
        'nomor_whatsapp_admin',
        'email_admin',
        'alamat_fisik',
        'jam_operasional',
        'deskripsi_singkat_website',
    ];
}
