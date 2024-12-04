<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarKelurahan = [
            // Daftar Kecamatan Bajuin
            [
                'nama_kelurahan' => 'Bajuin',
                'kecamatan_id' => 1
            ],
            [
                'nama_kelurahan' => 'Galam',
                'kecamatan_id' => 1
            ],
            [
                'nama_kelurahan' => 'Ketapang',
                'kecamatan_id' => 1
            ],
            [
                'nama_kelurahan' => 'Kunyit',
                'kecamatan_id' => 1
            ],
            [
                'nama_kelurahan' => 'Pemalongan',
                'kecamatan_id' => 1
            ],
            [
                'nama_kelurahan' => 'Sungai Bakar',
                'kecamatan_id' => 1
            ],
            [
                'nama_kelurahan' => 'Tanjung',
                'kecamatan_id' => 1
            ],
            [
                'nama_kelurahan' => 'Tebing Siring',
                'kecamatan_id' => 1
            ],
            [
                'nama_kelurahan' => 'Tirta Jaya',
                'kecamatan_id' => 1
            ],

            // Kecamatan Bati Bati
            [
                'nama_kelurahan' => 'Banyu Irang',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Bati Bati',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Bentok Darat',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Bentok Kampung',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Benua Raya',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Kait-Kait',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Kait-Kait Baru',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Liang Anggang',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Nusa Indah',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Padang',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Pandahan',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Sambangan',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Ujung',
                'kecamatan_id' => 2
            ],
            [
                'nama_kelurahan' => 'Ujung Baru',
                'kecamatan_id' => 2
            ],

            // Kecamatan Batu Ampar
            [
                'nama_kelurahan' => 'Ambawang',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Batu Ampar',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Bluru',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Damar Lima',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Damit',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Damit Hulu',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Durian Bungkuk',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Gunung Mas',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Gunung Melati',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Jilatan',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Jilatan Alur',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Pantai Linuh',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Tajau Mulya',
                'kecamatan_id' => 3
            ],
            [
                'nama_kelurahan' => 'Tajau Pecah',
                'kecamatan_id' => 3
            ],

            // Kecamatan Bumi Makur
            [
                'nama_kelurahan' => 'Bumi Harapan',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Handil Babirik',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Handil Birayang Atas',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Handil Birayang Bawah',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Handil Gayam',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Handil Labuan Amas',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Handil Maluka',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Handil Suruk',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Kurau Utara',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Pantai Harapan',
                'kecamatan_id' => 4
            ],
            [
                'nama_kelurahan' => 'Sungai Rasau',
                'kecamatan_id' => 4
            ],

            // Kecamatan Jorong
            [
                'nama_kelurahan' => 'Alur',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Asam Asam',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Asam Jaya',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Asri Mulya',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Batalang',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Jorong',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Karang Rejo',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Muara Asam Asam',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Sabuhur',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Simpang Empat Sungai Baru',
                'kecamatan_id' => 5
            ],
            [
                'nama_kelurahan' => 'Swarangan',
                'kecamatan_id' => 5
            ],

            // Kintap
            [
                'nama_kelurahan' => 'Bukit Mulia',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Kebun Raya',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Kintap',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Kintap Kecil',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Kintapura',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Mekar Sari',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Muara Kintap',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Pandan Sari',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Pasir Putih',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Riam Adungan',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Salaman',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Sebamban Baru',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Sumber Jaya',
                'kecamatan_id' => 6
            ],
            [
                'nama_kelurahan' => 'Sungai Cuka',
                'kecamatan_id' => 6
            ],

            // Kecamatan Kurau
            [
                'nama_kelurahan' => 'Bawah Layung',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Handil Negara',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Kali Besar',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Kurau',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Maluka Baulin',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Padang Luas',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Raden',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Sarikandi',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Sungai Bakau',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Tambak Karya',
                'kecamatan_id' => 7
            ],
            [
                'nama_kelurahan' => 'Tambak Sarinah',
                'kecamatan_id' => 7
            ],

            // Kecamatan Panyipatan
            [
                'nama_kelurahan' => 'Batakan',
                'kecamatan_id' => 8
            ],
            [
                'nama_kelurahan' => 'Batu Mulya',
                'kecamatan_id' => 8
            ],
            [
                'nama_kelurahan' => 'Batu Tungku',
                'kecamatan_id' => 8
            ],
            [
                'nama_kelurahan' => 'Bumi Asih',
                'kecamatan_id' => 8
            ],
            [
                'nama_kelurahan' => 'Kandangan Baru',
                'kecamatan_id' => 8
            ],
            [
                'nama_kelurahan' => 'Kandangan Lama',
                'kecamatan_id' => 8
            ],
            [
                'nama_kelurahan' => 'Kuringkit',
                'kecamatan_id' => 8
            ],
            [
                'nama_kelurahan' => 'Panyipatan',
                'kecamatan_id' => 8
            ],
            [
                'nama_kelurahan' => 'Suka Ramah',
                'kecamatan_id' => 8
            ],
            [
                'nama_kelurahan' => 'Tanjung Dewa',
                'kecamatan_id' => 8
            ],

            // Kecamatan Pelaihari
            [
                'nama_kelurahan' => 'Ambungan',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Atu–Atu',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Bumi Jaya',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Guntung Besar',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Kampung Baru',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Panggung',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Panggung Baru',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Panjaratan',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Pemuda',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Sumber Mulia',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Sungai Riam',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Tampang',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Telaga',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Tungkaran',
                'kecamatan_id' => 9
            ],
            [
                'nama_kelurahan' => 'Ujung Batu',
                'kecamatan_id' => 9
            ],

            // Kecamatan Takisung
            [
                'nama_kelurahan' => 'Batilai',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Benua Lawas',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Benua Tengah',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Gunung Makmur',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Kuala Tambangan',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Pagatan Besar',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Ranggang',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Ranggang Dalam',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Sumber Makmur',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Tabanio',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Takisung',
                'kecamatan_id' => 10
            ],
            [
                'nama_kelurahan' => 'Telaga Langsat',
                'kecamatan_id' => 10
            ],

            // Kecamatan Tambang Udang
            [
                'nama_kelurahan' => 'Bingkulu',
                'kecamatan_id' => 11
            ],
            [
                'nama_kelurahan' => 'Gunung Raja',
                'kecamatan_id' => 11
            ],
            [
                'nama_kelurahan' => 'Kayu Habang',
                'kecamatan_id' => 11
            ],
            [
                'nama_kelurahan' => 'Martadah',
                'kecamatan_id' => 11
            ],
            [
                'nama_kelurahan' => 'Martadah Baru',
                'kecamatan_id' => 11
            ],
            [
                'nama_kelurahan' => 'Pulau Sari',
                'kecamatan_id' => 11
            ],
            [
                'nama_kelurahan' => 'Sungai Jelai',
                'kecamatan_id' => 11
            ],
            [
                'nama_kelurahan' => 'Sungai Pinang',
                'kecamatan_id' => 11
            ],
            [
                'nama_kelurahan' => 'Tambang Ulang',
                'kecamatan_id' => 11
            ],
        ];

        foreach ($daftarKelurahan as $kelurahan) {
            Kelurahan::create([
                'nama_kelurahan' => $kelurahan['nama_kelurahan'],
                'kecamatan_id' => $kelurahan['kecamatan_id']
            ]);
        }
    }
}