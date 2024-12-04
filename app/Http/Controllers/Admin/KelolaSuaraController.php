<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\SuaraKecamatan;
use App\Models\SuaraKelurahan;
use App\Models\SuaraTps;
use App\Models\Tps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KelolaSuaraController extends Controller
{
    public function index()
    {
        $kecamatanDipilih = request('kecamatan');
        $kelurahanDipilih = request('kelurahan');

        $queryTps = Tps::with(['kecamatan', 'kelurahan', 'suaraTps'])->latest();

        if ($kecamatanDipilih) {
            $queryTps->where('kecamatan_id', $kecamatanDipilih);
        }

        if ($kelurahanDipilih) {
            $queryTps->where('kelurahan_id', $kelurahanDipilih);
        }

        $daftarDataTps = $queryTps->get();

        $daftarKelurahan = $kecamatanDipilih
            ? Kelurahan::select('id', 'nama_kelurahan')->where('kecamatan_id', $kecamatanDipilih)->get()
            : [];

        $daftarTps = $daftarDataTps->map(function ($dataTps) {
            return [
                'id' => $dataTps->id,
                'nomor_tps' => str_pad($dataTps->nomor_tps, 3, '0', STR_PAD_LEFT),
                'kelurahan' => $dataTps->kelurahan,
                'kecamatan' => $dataTps->kecamatan,
                'suara_tps' => $dataTps->suaraTps
            ];
        });

        return view('pages.admin.kelola-suara.index', [
            'title' => 'Kelola Suara TPS',
            'daftarTps' => $daftarTps,
            'kecamatanDipilih' => $kecamatanDipilih,
            'kelurahanDipilih' => $kelurahanDipilih,
            'daftarKecamatan' => Kecamatan::select('id', 'nama_kecamatan')->get(),
            'daftarKelurahan' => $daftarKelurahan,
            'totalSemuaTps' => Tps::count(),
            'totalSuaraRaza' => number_format($daftarTps->pluck('suara_tps')->sum('suara_raza')),
            'totalSuaraBaik' => $daftarTps->pluck('suara_tps')->sum('suara_baik'),
        ]);
    }

    public function create()
    {
        $daftarDataKecamatan = Kecamatan::all();

        $dataKecamatanDipilih = Kecamatan::find(request('kecamatan'));

        return view('pages.admin.kelola-suara.form', [
            'title' => 'Tambah Suara TPS',
            'daftarDataKecamatan' => $daftarDataKecamatan,
            'daftarDataKelurahan' => $dataKecamatanDipilih?->kelurahan,
            'dataKecamatanDipilih' => $dataKecamatanDipilih,
            'route' => [
                'route' => route('kelola-suara.store'),
                'method' => 'POST'
            ]
        ]);
    }

    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'kecamatan' => ['required'],
            'kelurahan' => ['required'],
            'nomor_tps' => [
                'required',
                'numeric',
                'not_in:0',
                'digits_between:1,3',
                Rule::unique('tps')->where(function ($query) use ($request) {
                    return $query->where('kelurahan_id', $request->kelurahan);
                })
            ],
            'suara_raza' => ['required', 'numeric'],
            'suara_baik' => ['required', 'numeric'],
            'daftar_gambar.*' => ['nullable', 'max:10240', 'image']
        ]);

        if ($request->hasFile('daftar_gambar')) {
            $namaKecamatan = Kecamatan::find($validated['kecamatan'])->nama_kecamatan;
            $namaKelurahan = Kelurahan::find($validated['kelurahan'])->nama_kelurahan;
            $nomorTps = str_pad($validated['nomor_tps'], 3, '0', STR_PAD_LEFT);

            $daftarGambar = [];
            foreach ($request->file('daftar_gambar') as $fileGambar) {
                $path = $fileGambar->store("$namaKecamatan/$namaKelurahan/TPS $nomorTps", 'public');
                $daftarGambar[] = $path;
            }
        }

        // Buat TPS
        $tps = Tps::create([
            'kecamatan_id' => $validated['kecamatan'],
            'kelurahan_id' => $validated['kelurahan'],
            'nomor_tps' => $validated['nomor_tps'],
        ]);

        // Buat suara TPS
        $suaraTps = SuaraTps::create([
            'tps_id' => $tps->id,
            'suara_raza' => $validated['suara_raza'],
            'suara_baik' => $validated['suara_baik'],
            'daftar_gambar' => json_encode($daftarGambar ?? [])
        ]);

        // Ambil suara Raza
        $suaraRaza = $suaraTps->suara_raza;
        // Ambil suara Baik
        $suaraBaik = $suaraTps->suara_baik;

        // Temukan suara kelurahan
        $suaraKelurahan = Kelurahan::find($validated['kelurahan'])->suaraKelurahan;

        SuaraKelurahan::updateOrCreate(
            [
                'kelurahan_id' => $validated['kelurahan']
            ],
            [
                // Jika suara kecamatan ada, tambahkan suara raza, jika tidak ada, buat baru
                'suara_raza' =>
                $suaraKelurahan ? $suaraKelurahan->suara_raza + $suaraRaza : $suaraRaza,
                // Jika suara kecamatan ada, tambahkan suara baik, jika tidak ada, buat baru
                'suara_baik' =>
                $suaraKelurahan ? $suaraKelurahan->suara_baik + $suaraBaik : $suaraBaik
            ]
        );

        // Temukan suara kecamatan
        $suaraKecamatan = Kecamatan::find($validated['kecamatan'])->suaraKecamatan;

        SuaraKecamatan::updateOrCreate(
            [
                'kecamatan_id' => $validated['kecamatan']
            ],
            [
                // Jika suara kecamatan ada, tambahkan suara raza, jika tidak ada, buat baru
                'suara_raza' =>
                $suaraKecamatan ? $suaraKecamatan->suara_raza + $suaraRaza : $suaraRaza,
                // Jika suara kecamatan ada, tambahkan suara baik, jika tidak ada, buat baru
                'suara_baik' =>
                $suaraKecamatan ? $suaraKecamatan->suara_baik + $suaraBaik : $suaraBaik
            ]
        );

        return redirect()->route('kelola-suara.index')->with('success', 'Data suara TPS berhasil ditambahkan');
    }

    public function show($tps)
    {
        return view('pages.admin.kelola-suara.detail', [
            'title' => 'Detail TPS',
            'tps' => Tps::find($tps)
        ]);
    }

    public function edit($tps)
    {
        $tps = Tps::find($tps);

        return view('pages.admin.kelola-suara.form', [
            'title' => 'Edit TPS',
            'tps' => $tps,
            'namaKecamatan' => $tps->kecamatan->nama_kecamatan,
            'namaKelurahan' => $tps->kelurahan->nama_kelurahan,
            'route' => [
                'route' => route('kelola-suara.update', $tps->id),
                'method' => 'PUT'
            ]
        ]);
    }

    public function update(Request $request, $tps)
    {

        $tps = Tps::find($tps);

        $validated = $request->validate([
            'nomor_tps' => [
                'required',
                'numeric',
                'not_in:0',
                'digits_between:1,3',
                Rule::unique('tps')->where(function ($query) use ($request) {
                    return $query->where('kelurahan_id', $request->kelurahan);
                })->ignore($tps->id)
            ],
            'suara_raza' => ['required', 'numeric'],
            'suara_baik' => ['required', 'numeric'],
            'daftar_gambar.*' => ['nullable', 'max:10240', 'image']
        ]);

        $suaraTps = $tps->suaraTps;

        $suaraKelurahan = $tps->kelurahan->suaraKelurahan;
        $suaraKecamatan = $tps->kecamatan->suaraKecamatan;

        $tps->update([
            'nomor_tps' => $validated['nomor_tps']
        ]);

        $suaraKelurahan->update([
            'suara_raza' => ($suaraKelurahan->suara_raza - $suaraTps->suara_raza) + $validated['suara_raza'],
            'suara_baik' => ($suaraKelurahan->suara_baik - $suaraTps->suara_baik) + $validated['suara_baik']
        ]);

        $suaraKecamatan->update([
            'suara_raza' => ($suaraKecamatan->suara_raza - $suaraTps->suara_raza) + $validated['suara_raza'],
            'suara_baik' => ($suaraKecamatan->suara_baik - $suaraTps->suara_baik) + $validated['suara_baik']
        ]);

        if ($request->hasFile('daftar_gambar')) {
            if ($suaraTps->daftar_gambar) {
                foreach (json_decode($suaraTps->daftar_gambar) as $gambar) {
                    Storage::delete($gambar);
                }
            }
            $namaKecamatan = $tps->kecamatan->nama_kecamatan;
            $namaKelurahan = $tps->kelurahan->nama_kelurahan;
            $nomorTps = str_pad($validated['nomor_tps'], 3, '0', STR_PAD_LEFT);

            $daftarGambar = [];
            foreach ($request->file('daftar_gambar') as $fileGambar) {
                $path = $fileGambar->store("$namaKecamatan/$namaKelurahan/TPS $nomorTps", 'public');
                $daftarGambar[] = $path;
            }
        }

        $suaraTps->update([
            'suara_raza' => $validated['suara_raza'],
            'suara_baik' => $validated['suara_baik'],
            'daftar_gambar' => json_encode($daftarGambar ?? [])
        ]);

        return redirect()->route('kelola-suara.index')->with('success', 'Data TPS berhasil diperbarui.');
    }

    public function destroy($tps)
    {
        $tps = Tps::find($tps);
        $suaraTps = $tps->suaraTps;

        if ($suaraTps->daftar_gambar) {
            foreach (json_decode($suaraTps->daftar_gambar) as $gambar) {
                Storage::delete($gambar);
            }
        }

        $suaraKelurahan = $tps->kelurahan->suaraKelurahan;
        $suaraKecamatan = $tps->kecamatan->suaraKecamatan;

        $suaraKelurahan->update([
            'suara_raza' => $suaraKelurahan->suara_raza - $suaraTps->suara_raza,
            'suara_baik' => $suaraKelurahan->suara_baik - $suaraTps->suara_baik
        ]);

        $suaraKecamatan->update([
            'suara_raza' => $suaraKecamatan->suara_raza - $suaraTps->suara_raza,
            'suara_baik' => $suaraKecamatan->suara_baik - $suaraTps->suara_baik
        ]);

        $tps->suaraTps()->delete();
        $tps->delete();

        return redirect()->route('kelola-suara.index')->with('success', 'Data TPS berhasil dihapus.');
    }
}
