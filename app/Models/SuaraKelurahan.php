<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuaraKelurahan extends Model
{
    protected $table = 'suara_kelurahan';

    protected $fillable = ['kelurahan_id', 'suara_raza', 'suara_baik'];
}