<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SuaraTps extends Model
{
    protected $table = 'suara_tps';

    protected $fillable = [
        'tps_id',
        'suara_raza',
        'suara_baik',
        'daftar_gambar',
    ];

    protected $cast = [
        'daftar_gambar' => 'array',
    ];

    public function tps(): HasOne
    {
        return $this->hasOne(Tps::class, 'id', 'tps_id');
    }
}