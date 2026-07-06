<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    protected $table = 'faq';

    protected $fillable = [
        'pertanyaan',
        'jawaban',
        'is_published',
        'created_from_saran_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function saranKritik(): BelongsTo
    {
        return $this->belongsTo(SaranKritik::class, 'created_from_saran_id');
    }
}
