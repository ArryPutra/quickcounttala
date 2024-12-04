<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SuaraKecamatan extends Model
{
    protected $table = 'suara_kecamatan';

    protected $fillable = ['kecamatan_id', 'suara_raza', 'suara_baik'];
}