@extends('layouts.layout', ['title' => $title])

@section('content')
    @include('layouts.admin.header')

    <div class="h-20"></div>

    <main class="sm:p-8 max-sm:p-4" x-data="{ showDialogImage: false, imageData: '' }">
        <x-button.back class="mb-4" href="{{ route('kelola-suara.index') }}" />

        <h1 class="font-bold text-2xl mb-4">{{ $title }}</h1>

        <div class="mb-6 flex gap-2">
            <div>
                <h1>Kecamatan</h1>
                <h1>Kelurahan</h1>
                <h1>Nomor TPS</h1>
                <br>
                <h1>Suara Raza</h1>
                <h1>Suara Baik</h1>
            </div>
            <div>
                <h1>: <b>{{ $tps->kecamatan->nama_kecamatan }}</b></h1>
                <h1>: <b>{{ $tps->kelurahan->nama_kelurahan }}</b></h1>
                <h1>: <b>{{ str_pad($tps->nomor_tps, 3, '0', STR_PAD_LEFT) }}</b></h1>
                <br>
                <h1>: <b>{{ $tps->suaraTps->suara_raza }}</b></h1>
                <h1>: <b>{{ $tps->suaraTps->suara_baik }}</b></h1>
            </div>
        </div>

        <h1 class="font-bold text-xl mb-4">Daftar Dokumen</h1>
        <div class="flex gap-8 flex-wrap">
            @foreach (json_decode($tps->suaraTps->daftar_gambar) as $gambar)
                <img @click="showDialogImage = true, imageData = `/storage/{{ $gambar }}`"
                    class="size-72 rounded-lg object-cover border" src="/storage/{{ $gambar }}">
            @endforeach
        </div>
        <div x-show="showDialogImage">
            <div @click="showDialogImage = false" class="bg-black/50 w-full h-screen fixed top-0 left-0 z-20"></div>
            <img class="object-cover max-w-full h-auto max-h-[80%] border fixed top-1/2 -translate-y-1/2 z-20 right-1/2 translate-x-1/2 shadow-xl duration-150"
                :class="{ 'opacity-100': showDialogImage, 'opacity-0': !showDialogImage }" x-bind:src="imageData">
        </div>
    </main>
@endsection
