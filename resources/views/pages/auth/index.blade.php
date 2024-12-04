@extends('layouts.layout', ['title' => $title])

@push('head')
    {!! RecaptchaV3::initJs() !!}
@endpush

@section('content')
    <main class="flex items-center sm:justify-center max-sm:pt-8 h-[100dvh] flex-col bg-gray-50 gap-4">
        <div class="flex items-center gap-4 w-80">
            <img src="{{ asset('images/kotak-pemilu.png') }}" class="h-16">
            <div>
                <h1 class="font-bold text-xl">Quick Qount</h1>
                <span class="text-sm">Pilkada Tala 2024</span>
            </div>
        </div>
        <div class="border p-6 rounded-xl w-80 bg-white">
            @error('g-recaptcha-response')
                <div class="bg-red-100 py-2 px-3 rounded border border-red-200 mb-3">
                    <span class="text-sm">reCAPTCHA tidak valid</span>
                </div>
            @enderror
            @error('pesan')
                <div class="bg-red-100 py-2 px-3 rounded border border-red-200 mb-3">
                    <span class="text-sm">Login gagal</span>
                </div>
            @enderror
            <h1 class="font-bold text-3xl">Masuk</h1>
            <br>
            <div class="flex flex-col gap-4">
                <form action="{{ route('login') }}" method="post" class="flex flex-col gap-4">
                    @csrf
                    {!! RecaptchaV3::field('register') !!}

                    <x-textfield name="nama_pengguna" placeholder="Nama Pengguna" type="text"></x-textfield>
                    <x-textfield name="password" placeholder="Password" type="password"></x-textfield>

                    <x-button class="w-full g-recaptcha">Masuk</x-button>
                </form>
            </div>
        </div>
        <a href="/" class="w-80 text-blue-600 hover:underline">Kembali ke Halaman Utama</a>
    </main>
@endsection
