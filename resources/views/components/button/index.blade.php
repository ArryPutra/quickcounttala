@php
    switch ($color ?? 'blue') {
        case 'blue':
            $bg = 'bg-blue-600';
            $hoverColor = 'hover:bg-blue-700';
            $ringColor = 'focus:ring-blue-200';
            break;
        case 'red':
            $bg = 'bg-red-600';
            $hoverColor = 'hover:bg-red-700';
            $ringColor = 'focus:ring-red-200';
            break;
        case 'green':
            $bg = 'bg-green-600';
            $hoverColor = 'hover:bg-green-700';
            $ringColor = 'focus:ring-green-200';
            break;
    }
@endphp

@if (isset($href))
    <a href="{{ $href }}">
        <button
            {{ $attributes->merge(['class' => "$bg px-4 py-2 font-semibold text-white rounded-lg $hoverColor focus:ring-4 $ringColor duration-150"]) }}>
            {{ $slot }}
        </button>
    </a>
@else
    <button
        {{ $attributes->merge(['class' => "$bg px-4 py-2 font-semibold text-white rounded-lg $hoverColor focus:ring-4 $ringColor duration-150"]) }}>
        {{ $slot }}
    </button>
@endif
