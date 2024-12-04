<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tps extends Model
{
    protected $table = 'tps';

    protected $fillable = [
        'kecamatan_id',
        'kelurahan_id',
        'nomor_tps',
    ];

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function suaraTps(): HasOne
    {
        return $this->hasOne(SuaraTps::class);
    }
}