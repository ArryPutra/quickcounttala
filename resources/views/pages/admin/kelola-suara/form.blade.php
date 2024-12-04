@extends('layouts.layout', ['title' => $title])

@section('content')
    @include('layouts.admin.header')

    <div class="h-20"></div>

    <main class="sm:p-8 max-sm:p-4">
        <x-button.back href="{{ route('kelola-suara.index') }}"></x-button.back>

        <h1 class="my-4 font-bold text-2xl">{{ $title }}</h1>

        @if ($route['method'] == 'PUT')
            <div class="mb-2">
                <a href="{{ route('kelola-suara.edit', $tps->id) }}" class="text-blue-600 hover:underline">
                    Kembalikan data awal
                </a>
            </div>
        @endif

        <form action="{{ $route['route'] }}" method="post" enctype="multipart/form-data">
            @csrf
            @method($route['method'])
            @if ($route['method'] == 'POST')
                <div class="grid grid-cols-2 gap-4 max-sm:grid-cols-1 mb-4">
                    <x-dropdown name='kecamatan' class="w-full" onchange="pilihKecamatan()">
                        <x-slot:label>Pilih kecamatan</x-slot:label>
                        @foreach ($daftarDataKecamatan as $dataKecamatan)
                            <x-dropdown.menu :selected="$dataKecamatan->id == $dataKecamatanDipilih?->id ? true : false" value="{{ $dataKecamatan->id }}">
                                {{ $dataKecamatan->nama_kecamatan }}
                            </x-dropdown.menu>
                        @endforeach
                    </x-dropdown>
                    <x-dropdown name="kelurahan" class="w-full">
                        <x-slot:label>Pilih kelurahan</x-slot:label>
                        @if (isset($daftarDataKelurahan))
                            @foreach ($daftarDataKelurahan as $dataKelurahan)
                                <x-dropdown.menu :selected="$dataKelurahan->id == old('kelurahan', $dataKelurahanDipilih->id ?? false)
                                    ? true
                                    : false" value="{{ $dataKelurahan->id }}">
                                    {{ $dataKelurahan->nama_kelurahan }}
                                </x-dropdown.menu>
                            @endforeach
                        @endif
                    </x-dropdown>
                </div>
            @else
                <div class="mb-4">
                    <h1 class="text-lg">Kecamatan: <b>{{ $namaKecamatan }}</b></h1>
                    <h1 class="text-lg">Kelurahan: <b>{{ $namaKelurahan }}</b></h1>
                </div>
            @endif
            <x-textfield value="{{ old('nomor_tps', $tps->nomor_tps ?? false) }}" name="nomor_tps"
                placeholder="Masukkan nomor TPS, contoh: 001" class="sm:max-w-[49%]">
                <x-slot:label>Nomor TPS</x-slot:label>
            </x-textfield>
            <div class="grid grid-cols-4 max-sm:grid-cols-1 gap-4 my-4">
                <x-textfield value="{{ old('suara_raza', $tps->suaraTps->suara_raza ?? false) }}" name="suara_raza"
                    placeholder="Masukkan total suara Raza">
                    <x-slot:label>Suara Raza</x-slot:label>
                </x-textfield>
                <x-textfield value="{{ old('suara_baik', $tps->suaraTps->suara_baik ?? false) }}" name="suara_baik"
                    placeholder="Masukkan total suara Baik">
                    <x-slot:label>Suara Baik</x-slot:label>
                </x-textfield>
            </div>
            <div class="mb-6">
                <label for="file-input" class="text-lg">Tambahkan gambar</label>
                <div class="h-2"></div>
                <input type="file" name="daftar_gambar[]" id="file-input"
                    class="block w-72 border border-gray-200 shadow-sm rounded-lg
                    text-sm focus:z-10 focus:ring-4 duration-150
                    disabled:opacity-50 disabled:pointer-events-none
                  file:bg-gray-50 file:border-0 file:me-4 
                    file:py-2.5 file:px-4"
                    multiple>
                @error('daftar_gambar.*')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <x-button type="submit">
                {{ $route['method'] == 'POST' ? 'Tambah' : 'Perbarui' }}
                TPS
            </x-button>
        </form>
    </main>

    <script>
        function pilihKecamatan() {
            const selectedValue = event.target.value;
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('kecamatan', selectedValue);
            window.location.href = currentUrl.toString();
        }
    </script>
@endsection
