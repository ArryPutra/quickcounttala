<div x-data="{ show: true }" x-show="show"
    class="mb-4 bg-green-100 px-4 py-3 rounded-md border-2 border-green-200 flex justify-between items-center">
    <span>{{ $slot }}</span>
    <button @click="show = !show" class="cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
            <path
                d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
            </path>
        </svg>
    </button>
</div>
