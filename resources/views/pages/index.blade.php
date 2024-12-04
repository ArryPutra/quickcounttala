@extends('layouts.layout', ['title' => 'Quick Qount Pilkada Tala 2024'])

@section('content')
    @include('layouts.header')

    <main class="w-full flex flex-col items-center pt-4 pb-8 px-8 max-sm:px-4">

        <div class="h-20"></div>

        <div class="flex gap-2 flex-col w-full max-w-7xl mb-4">
            <div class="flex justify-start w-full mb-3">
                <img src="{{ asset('images/logo-pkb.png') }}" class="h-16">
            </div>
            @if (isset($namaKecamatanDipilih))
                <div class="flex gap-1">
                    <div class="flex flex-col">
                        @if ($namaKecamatanDipilih)
                            <span>Kecamatan</span>
                        @endif
                        @if (isset($namaKelurahanDipilih))
                            <span>Kelurahan</span>
                        @endif
                        @if (isset($nomorTpsDipilih))
                            <span>TPS</span>
                        @endif
                    </div>
                    <div class="flex flex-col">
                        @if (isset($namaKecamatanDipilih))
                            <b>: {{ $namaKecamatanDipilih }}</b>
                        @endif
                        @if (isset($namaKelurahanDipilih))
                            <b>: {{ $namaKelurahanDipilih }}</b>
                        @endif
                        @if (isset($nomorTpsDipilih))
                            <b>: {{ str_pad($nomorTpsDipilih, 3, '0', STR_PAD_LEFT) }}</b>
                        @endif
                    </div>
                </div>
                <a href="/" class="text-blue-600 hover:underline">Hapus Wilayah</a>
            @else
                <h1>Wilayah: <b>Tanah Laut</b></h1>
            @endif
        </div>

        <div class="w-full max-w-7xl flex justify-center max-xl:flex-col gap-4">
            <section class="relative h-fit w-full">
                <x-dropdown class="mb-4 menuPilihDiagram" onchange="gantiDiagramBatang(event)">
                    <x-dropdown.menu value="diagram-batang">
                        Diagram Batang
                    </x-dropdown.menu>
                    <x-dropdown.menu value="diagram-lingkaran">
                        Diagram Lingkaran
                    </x-dropdown.menu>
                </x-dropdown>
                <div id="batang"></div>
                <div id="lingkaran" class="hidden"></div>
                <div class="bg-white absolute right-2.5 bottom-0 w-20 h-3.5"></div>
            </section>

            <section class="xl:max-w-3xl w-full">
                @if (empty($nomorTpsDipilih))
                    <div class="mb-4 w-full text-center">
                        <h1 class="font-bold text-xl">Daftar {{ $namaWilayah }}</h1>
                    </div>
                    <x-table>
                        <x-table.thead>
                            <x-table.th>No</x-table.th>
                            <x-table.th>
                                {{ $namaWilayah }}
                            </x-table.th>
                            <x-table.th>Suara Raza</x-table.th>
                            <x-table.th>Suara Baik</x-table.th>
                            <x-table.th>Detail</x-table.th>
                        </x-table.thead>
                        @foreach ($daftarWilayah as $wilayah)
                            <x-table.tbody>
                                <x-table.th>{{ $loop->iteration }}</x-table.th>
                                <x-table.td>{{ $wilayah['nama'] }}</x-table.td>
                                <x-table.td>{{ $wilayah['suara_raza'] }}</x-table.td>
                                <x-table.td>{{ $wilayah['suara_baik'] }}</x-table.td>
                                <x-table.td>
                                    <form method="GET" action="{{ Request::fullUrl() . '/' . $wilayah['id'] }}">
                                        <x-button type="submit" value="{{ $wilayah['id'] }}"
                                            type="submit">Detail</x-button>
                                    </form>
                                </x-table.td>
                            </x-table.tbody>
                        @endforeach
                        <x-table.tbody>
                            <x-table.td colspan="2">Total</x-table.td>
                            <x-table.th>{{ number_format($totalSuaraRaza, 0, '.', ',') }}</x-table.th>
                            <x-table.th colspan="3">{{ number_format($totalSuaraBaik, 0, '.', ',') }}</x-table.th>
                        </x-table.tbody>
                    </x-table>
                @else
                    <div x-data="{ showDialogImage: false, imageData: '' }">
                        @if (count(json_decode($tps->suaraTps->daftar_gambar)))
                            <div class="mb-4 w-full text-center">
                                <h1 class="font-bold text-xl">Daftar Dokumen</h1>
                            </div>
                            <div class="flex gap-8 flex-wrap justify-center">
                                @foreach (json_decode($tps->suaraTps->daftar_gambar) as $gambar)
                                    <img @click="showDialogImage = true, imageData = `/storage/{{ $gambar }}`"
                                        class="size-72 rounded-lg object-cover border" src="/storage/{{ $gambar }}">
                                @endforeach
                            </div>
                        @else
                            <div class="mb-4 w-full text-center">
                                <h1 class="font-bold text-xl">Tidak ada dokumen</h1>
                            </div>
                        @endif
                        <div x-show="showDialogImage" x-cloak>
                            <div @click="showDialogImage = false"
                                class="bg-black/50 w-full h-screen fixed top-0 left-0 z-20"></div>
                            <img class="object-cover max-w-full h-auto max-h-[80%] border fixed top-1/2 -translate-y-1/2 z-20 right-1/2 translate-x-1/2 shadow-xl duration-150"
                                :class="{ 'opacity-100': showDialogImage, 'opacity-0': !showDialogImage }"
                                x-bind:src="imageData">
                        </div>
                    </div>
                @endif
            </section>
        </div>

        <div class="mt-6 border w-full max-w-7xl p-4 rounded-xl hover:bg-gray-50 duration-150">
            Catatan: <b>{{ $totalTps }} TPS telah diinput.</b>
        </div>

    </main>
    @include('layouts.footer')
    {{-- SCRIPT --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        gantiDiagramBatang(localStorage.getItem('diagramHalamanUtama') ?? 'diagram-batang');

        function gantiDiagramBatang(valueParam) {

            let value = valueParam;
            if (typeof valueParam !== 'string') {
                value = valueParam.target.value;
            }

            const diagramBatang = document.getElementById('batang');
            const diagramLingkaran = document.getElementById('lingkaran');
            if (value == 'diagram-lingkaran') {
                document.querySelector('.menuPilihDiagram').value = 'diagram-lingkaran';
                localStorage.setItem('diagramHalamanUtama', 'diagram-lingkaran');
                diagramLingkaran.classList.remove('hidden');
                diagramBatang.classList.add('hidden');
            } else {
                document.querySelector('.menuPilihDiagram').value = 'diagram-batang';
                localStorage.setItem('diagramHalamanUtama', 'diagram-batang');
                diagramLingkaran.classList.add('hidden');
                diagramBatang.classList.remove('hidden');
            }
        }
    </script>
    <script>
        const totalSuaraRaza = {{ $totalSuaraRaza }}
        const totalSuaraBaik = {{ $totalSuaraBaik }}
        // const totalSuaraRaza = 155.051
        // const totalSuaraBaik = 659

        const totalSuaraPaslon = totalSuaraRaza + totalSuaraBaik;

        let suaraRazaPersentase = 0;
        let suaraBaikPersentase = 0;

        if (totalSuaraPaslon > 0) {
            suaraRazaPersentase = (totalSuaraRaza / totalSuaraPaslon) * 100;
            suaraBaikPersentase = (totalSuaraBaik / totalSuaraPaslon) * 100;
        }

        Highcharts.chart('batang', {
            chart: {
                type: 'column'
            },
            title: {
                align: 'left',
                text: 'Hasil Quick Count Pilkada Tala 2024'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%',
                        style: {
                            fontSize: '16px',
                            fontWeight: 'bold'
                        }
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: ' +
                    '<b>{point.y:.2f}%</b><br/>'
            },

            series: [{
                name: 'Total Suara',
                colorByPoint: true,
                data: [{
                        name: 'H. Rahmat Trianto dan H. Muhammad Zazuli',
                        y: suaraRazaPersentase,
                        drilldown: 'Raza',
                        color: '#1F51FF'
                    },
                    {
                        name: 'H. Bambang Alamsyah dan Ikhwan Hariri',
                        y: suaraBaikPersentase,
                        drilldown: 'Baik',
                        color: '#D22B2B'
                    },
                ]
            }],

        });

        Highcharts.chart('lingkaran', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Hasil Quick Count Pilkada Tala 2024'
            },
            tooltip: {
                pointFormat: '<b>{point.percentage:.1f}%</b>' // Format tooltip dengan satu desimal
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
            series: [{
                name: 'Percentage',
                colorByPoint: true,
                data: [{
                        name: 'RaZa',
                        y: suaraRazaPersentase,
                        color: '#1F51FF'
                    },
                    {
                        name: 'BAIK',
                        y: suaraBaikPersentase,
                        color: '#D22B2B'
                    },
                ]
            }],
        });
    </script>
@endsection
