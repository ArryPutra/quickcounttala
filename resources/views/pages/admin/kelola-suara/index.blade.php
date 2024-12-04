@extends('layouts.layout', ['title' => $title])

@section('content')
    @include('layouts.admin.header')
    <div class="h-20"></div>
    <main class="sm:p-8 max-sm:p-4">

        <x-button.back href="/" label="Halaman Utama" class="mb-4"></x-button.back>

        <div class="mb-4 flex gap-2">
            <div>
                <h1>Total Semua TPS</h1>
            </div>
            <div>
                : <b>{{ $totalSemuaTps }}</b>
            </div>
        </div>

        <div class="flex justify-between items-end gap-4 flex-wrap mb-4">
            <div class="flex flex-wrap gap-4">
                <x-dropdown :placeholderOption=false onchange="pilihKecamatan()">
                    <x-slot:label>Kecamatan</x-slot:label>
                    <x-dropdown.menu value="semua">Semua</x-dropdown.menu>
                    @foreach ($daftarKecamatan as $kecamatan)
                        <x-dropdown.menu :selected="$kecamatanDipilih == $kecamatan->id"
                            value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</x-dropdown.menu>
                    @endforeach
                </x-dropdown>
                <x-dropdown :placeholderOption=false onchange="pilihKelurahan()">
                    <x-slot:label>Kelurahan</x-slot:label>
                    <x-dropdown.menu value="semua">Semua</x-dropdown.menu>
                    @foreach ($daftarKelurahan as $kelurahan)
                        <x-dropdown.menu :selected="$kelurahanDipilih == $kelurahan->id"
                            value="{{ $kelurahan->id }}">{{ $kelurahan->nama_kelurahan }}</x-dropdown.menu>
                    @endforeach
                </x-dropdown>
            </div>

            <x-button href="{{ route('kelola-suara.create') }}" class="h-fit">Tambah Suara TPS</x-button>
        </div>

        <div class="mb-4 flex gap-2">
            <div>
                <h1>Total TPS Ditemukan</h1>
            </div>
            <div>
                : <b>{{ $daftarTps->count() }}</b>
            </div>
        </div>

        @if (session('success'))
            <x-alert>{{ session('success') }}</x-alert>
        @endif

        <x-table>
            <x-table.thead>
                <x-table.th>No</x-table.th>
                <x-table.th>Nomor TPS</x-table.th>
                <x-table.th>Kecamatan</x-table.th>
                <x-table.th>Kelurahan</x-table.th>
                <x-table.th>Suara Raza</x-table.th>
                <x-table.th>Suara Baik</x-table.th>
                <x-table.th>Aksi</x-table.th>
            </x-table.thead>
            @if (count($daftarTps) > 0)
                @foreach ($daftarTps as $tps)
                    <x-table.tbody>
                        <x-table.th>{{ $loop->iteration }}</x-table.th>
                        <x-table.td>{{ $tps['nomor_tps'] }}</x-table.td>
                        <x-table.td>{{ $tps['kecamatan']['nama_kecamatan'] }}</x-table.td>
                        <x-table.td>{{ $tps['kelurahan']['nama_kelurahan'] }}</x-table.td>
                        <x-table.td>{{ $tps['suara_tps']['suara_raza'] }}</x-table.td>
                        <x-table.td>{{ $tps['suara_tps']['suara_baik'] }}</x-table.td>
                        <x-table.td class="flex flex-wrap gap-2">
                            <x-button href="{{ route('kelola-suara.show', $tps['id']) }}" color="green">Detail</x-button>
                            <x-button href="{{ route('kelola-suara.edit', $tps['id']) }}">Edit</x-button>
                            <form action="{{ route('kelola-suara.destroy', $tps['id']) }}" method="post"
                                onsubmit="return confirm('Apakah anda yakin ingin menghapus nomor TPS {{ $tps['nomor_tps'] }} Keluruhan {{ $tps['kelurahan']['nama_kelurahan'] }}?')">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit" color="red">Hapus</x-button>
                            </form>
                        </x-table.td>
                    </x-table.tbody>
                @endforeach
                <x-table.tbody class="!bg-gray-100">
                    <x-table.td colspan="4">Total</x-table.td>
                    <x-table.th>{{ $totalSuaraRaza }}</x-table.th>
                    <x-table.th colspan="2">{{ $totalSuaraBaik }}</x-table.th>
                </x-table.tbody>
            @else
                <x-table.tbody>
                    <x-table.td colspan="7" class="text-center">Tidak ada data</x-table.td>
                </x-table.tbody>
            @endif
        </x-table>

    </main>

    <script>
        function pilihKecamatan(paramValue) {
            const selectedValue = event.target.value;
            const currentUrl = new URL(window.location.href);
            if (selectedValue !== 'semua') {
                currentUrl.searchParams.set('kecamatan', selectedValue);
                window.location.href = currentUrl.toString();
            } else {
                currentUrl.searchParams.delete('kecamatan');
                currentUrl.searchParams.delete('kelurahan');
                window.location.href = currentUrl.toString();
            }
        }

        function pilihKelurahan(paramValue) {
            const selectedValue = event.target.value;
            const currentUrl = new URL(window.location.href);
            if (selectedValue !== 'semua') {
                currentUrl.searchParams.set('kelurahan', selectedValue);
                window.location.href = currentUrl.toString();
            } else {
                currentUrl.searchParams.delete('kelurahan');
                window.location.href = currentUrl.toString();
            }
        }
    </script>
@endsection
