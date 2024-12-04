<?php

namespace Database\Seeders;

use App\Models\Tps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tps::create([
            'nomor_tps' => 1,
            'kecamatan_id' => 1,
            'kelurahan_id' => 1
        ]);
        Tps::create([
            'nomor_tps' => 1,
            'kecamatan_id' => 1,
            'kelurahan_id' => 2
        ]);
        Tps::create([
            'nomor_tps' => 1,
            'kecamatan_id' => 2,
            'kelurahan_id' => 10
        ]);
    }
}