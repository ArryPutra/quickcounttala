<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Tps;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Kecamatan $kecamatan, Kelurahan $kelurahan, Tps $tps)
    {
        // return $kecamatan->kelurahan;
        $namaKecamatanDipilih = $kecamatan->nama_kecamatan;
        $namaKelurahanDipilih = $kelurahan->nama_kelurahan;
        $nomorTpsDipilih = $tps->nomor_tps;

        $daftarDataKecamatan = Kecamatan::with('suaraKecamatan')->get();

        foreach ($daftarDataKecamatan as $dataKecamatan) {
            $daftarWilayah[] = [
                'id' => $dataKecamatan->id,
                'nama' => $dataKecamatan->nama_kecamatan,
                'suara_raza' => number_format($dataKecamatan->suaraKecamatan->suara_raza ?? 0, 0, ',', '.'),
                'suara_baik' => number_format($dataKecamatan->suaraKecamatan->suara_baik ?? 0, 0, ',', '.'),
            ];
        }

        if (isset($namaKecamatanDipilih)) {
            $daftarWilayah = [];
            $daftarDataKelurahan = $kecamatan->kelurahan;
            foreach ($daftarDataKelurahan as $dataKelurahan) {
                $daftarWilayah[] = [
                    'id' => $dataKelurahan->id,
                    'nama' => $dataKelurahan->nama_kelurahan,
                    'suara_raza' => $dataKelurahan->suaraKelurahan->suara_raza ?? 0,
                    'suara_baik' => $dataKelurahan->suaraKelurahan->suara_baik ?? 0
                ];
            }
        }
        if (isset($namaKelurahanDipilih)) {
            $daftarWilayah = [];
            $daftarDataTps = $kelurahan->tps;
            foreach ($daftarDataTps as $dataTps) {
                $daftarWilayah[] = [
                    'id' => $dataTps->id,
                    'nama' => str_pad($dataTps->nomor_tps, 3, '0', STR_PAD_LEFT),
                    'suara_raza' => $dataTps->suaraTps->suara_raza ?? 0,
                    'suara_baik' => $dataTps->suaraTps->suara_baik ?? 0
                ];
            }
        }

        $namaWilayah = empty($namaKecamatanDipilih) ? 'Kecamatan' : (empty($namaKelurahanDipilih) ? 'Kelurahan' : 'TPS');

        return view('pages.index', [
            'title' => 'Quick Qount Pilkada Tala 2024',
            'daftarKecamatan' => Kecamatan::all(),
            'namaKecamatanDipilih' => $namaKecamatanDipilih,
            'namaKelurahanDipilih' => $namaKelurahanDipilih,
            'nomorTpsDipilih' => $nomorTpsDipilih,
            'tps' => $tps,
            'daftarWilayah' => $daftarWilayah,
            'namaWilayah' => $namaWilayah,
            'totalSuaraRaza' => collect($daftarWilayah)
                ->map(function ($item) {
                    // Hapus titik (sebagai pemisah ribuan) dan ubah ke integer
                    $item['suara_raza'] = (int) str_replace('.', '', $item['suara_raza']);
                    return $item;
                })
                ->sum('suara_raza'),
            'totalSuaraBaik' => collect($daftarWilayah)
                ->map(function ($item) {
                    // Hapus titik (sebagai pemisah ribuan) dan ubah ke integer
                    $item['suara_baik'] = (int) str_replace('.', '', $item['suara_baik']);
                    return $item;
                })
                ->sum('suara_baik'),
            'totalTps' => Tps::count()
        ]);
    }
}
