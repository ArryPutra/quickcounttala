<a href="{{ $href ?? 'javascript:history.back()' }}"
    {{ $attributes->merge(['class' => 'bg-gray-100 text-black pl-3 pr-4 py-2 font-semibold flex gap-2 rounded-lg focus:ring-4 ring-gray-200 duration-150 w-fit']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
        style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
        <path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path>
    </svg>
    {{ $label ?? 'Kembali' }}
</a>
