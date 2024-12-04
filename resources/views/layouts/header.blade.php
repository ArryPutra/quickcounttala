<header class="bg-white h-20 w-full flex items-center px-8 max-sm:px-4 fixed justify-between z-10 border-b">
    <div class="flex items-center gap-4">
        <img src="{{ asset('images/kotak-pemilu.png') }}" class="h-14">
        <div>
            <h1 class="font-bold text-2xl">Quick Count</h1>
            <span>Pilkada Tala 2024</span>
        </div>
    </div>
    <x-button href="{{ route('login') }}">Masuk</x-button>
</header>
