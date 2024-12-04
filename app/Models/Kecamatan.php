<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    protected $fillable = [
        'nama_kecamatan'
    ];

    public function kelurahan(): HasMany
    {
        return $this->hasMany(Kelurahan::class);
    }

    public function suaraKecamatan(): HasOne
    {
        return $this->hasOne(SuaraKecamatan::class);
    }
}