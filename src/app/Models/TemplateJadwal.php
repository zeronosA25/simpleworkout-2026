<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TemplateJadwal extends Model
{
    protected $table = 'template_jadwal';

    protected $fillable = [
        'nama_template',
        'slug',
        'deskripsi',
        'jumlah_hari_per_minggu',
    ];

    public function hariJadwal(): HasMany
    {
        return $this->hasMany(HariJadwal::class)->orderBy('urutan_hari');
    }
}
