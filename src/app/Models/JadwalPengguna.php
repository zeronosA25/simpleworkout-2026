<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalPengguna extends Model
{
    protected $table = 'jadwal_pengguna';

    protected $fillable = [
        'user_id',
        'hari_jadwal_id',
        'is_checked',
        'checked_at',
    ];

    protected $casts = [
        'is_checked' => 'boolean',
        'checked_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hariJadwal(): BelongsTo
    {
        return $this->belongsTo(HariJadwal::class);
    }
}
