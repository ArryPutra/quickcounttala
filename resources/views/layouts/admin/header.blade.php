<div {{-- x-data="{ isOpenNavMenu: false }" --}}>
    <header class="h-20 bg-white border-b w-full flex items-center px-8 max-sm:px-4 fixed justify-between z-10">
        <div class="flex items-center gap-4 {{-- max-sm:hidden --}}">
            <img src="{{ asset('images/kotak-pemilu.png') }}" class="h-14">
            <div>
                <h1 class="font-bold text-2xl">Quick Count</h1>
                <span>Pilkada Tala 2024</span>
            </div>
        </div>
        {{-- <div @click="isOpenNavMenu = !isOpenNavMenu" class="hidden max-sm:block bg-gray-50 rounded-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-12" viewBox="0 0 24 24"
                style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                <path d="M4 11h12v2H4zm0-5h16v2H4zm0 12h7.235v-2H4z"></path>
            </svg>
        </div> --}}
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <x-button type="submit" color="red">Keluar</x-button>
        </form>
    </header>
    {{-- <nav x-bind:class="isOpenNavMenu ? 'block' : 'max-sm:hidden'"
        class="fixed top-20 bg-white pt-5 max-sm:py-0 shadow w-full px-8 sm:px-8 max-sm:px-0 flex sm:gap-8 max-sm:absolute max-sm:flex-col z-10">
        <a href="{{ route('admin.dashboard') }}">
            <button
                class="{{ Request::is('admin/dashboard') ? 'sm:border-b-2 border-blue-500 max-sm:border-l-2 max-sm:pl-3.5 font-semibold' : 'sm:hover:border-b-2' }} sm:pb-5 max-sm:py-4 max-sm:pl-4 max-sm:hover:bg-gray-100 max-sm:w-full text-start duration-150">
                Dashboard
            </button>
        </a>
        <a href="{{ route('kelola-suara.index') }}">
            <button
                class="{{ Str::startsWith(Request::path(), 'admin/kelola-suara') ? 'sm:border-b-2 border-blue-500 max-sm:border-l-2 max-sm:pl-3.5 font-semibold' : 'sm:hover:border-b-2' }} sm:pb-5 max-sm:py-4 max-sm:pl-4 max-sm:hover:bg-gray-100 max-sm:w-full text-start duration-150">
                Kelola Suara
            </button>
        </a>
        <a href="{{ route('index') }}">
            <button
                class="sm:hover:border-b-2 sm:pb-5 max-sm:py-4 max-sm:pl-4 max-sm:hover:bg-gray-100 max-sm:w-full text-start duration-150">
                Halaman Utama
            </button>
        </a>
    </nav> --}}
</div>
