<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SaranKritik extends Model
{
    protected $table = 'saran_kritik';

    protected $fillable = [
        'user_id',
        'kategori',
        'pesan',
        'status',
        'balasan_admin',
        'resolved_at',
    ];

    protected $casts = [
        'resolved_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class, 'created_from_saran_id');
    }
}
