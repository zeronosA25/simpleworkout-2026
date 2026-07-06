<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailJadwal extends Model
{
    protected $table = 'detail_jadwal';

    protected $fillable = [
        'hari_jadwal_id',
        'gerakan_id',
        'urutan_gerakan',
    ];

    public function hariJadwal(): BelongsTo
    {
        return $this->belongsTo(HariJadwal::class);
    }

    public function workout(): BelongsTo
    {
        return $this->belongsTo(Workout::class, 'gerakan_id');
    }
}
