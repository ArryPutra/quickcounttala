<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';

    protected $fillable = [
        'nama_kelurahan',
        'kecamatan_id',
    ];

    public function tps(): HasMany
    {
        return $this->hasMany(Tps::class);
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function suaraKelurahan(): HasOne
    {
        return $this->hasOne(SuaraKelurahan::class);
    }
}