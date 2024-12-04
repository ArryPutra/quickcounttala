<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarNamaKecamatan =
            [
                'Bajuin',
                'Bati Bati',
                'Batu Ampar',
                'Bumi Makmur',
                'Jorong',
                'Kintap',
                'Kurau',
                'Panyipatan',
                'Pelaihari',
                'Takisung',
                'Tambang Ulang'
            ];

        foreach ($daftarNamaKecamatan as $kecamatan) {
            Kecamatan::create([
                'nama_kecamatan' => $kecamatan,
            ]);
        }
    }
}