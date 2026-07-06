<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HariJadwal extends Model
{
    protected $table = 'hari_jadwal';

    protected $fillable = [
        'template_jadwal_id',
        'nama_hari',
        'urutan_hari',
    ];

    public function templateJadwal(): BelongsTo
    {
        return $this->belongsTo(TemplateJadwal::class);
    }

    public function detailJadwal(): HasMany
    {
        return $this->hasMany(DetailJadwal::class)->orderBy('urutan_gerakan');
    }

    public function jadwalPengguna(): HasMany
    {
        return $this->hasMany(JadwalPengguna::class);
    }
}
