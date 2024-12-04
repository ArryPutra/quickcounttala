<div>
    @if (isset($label))
        <label for="{{ $attributes->get('name') }}" class="text-lg">{{ $label }}</label>
        <div class="h-2"></div>
    @endif
    <select id="{{ $attributes->get('name') }}"
        {{ $attributes->merge(['class' => 'bg-white border-2 duration-150 focus:ring-4 w-fit p-2 rounded-lg cursor-pointer']) }}>
        @if (isset($label) && ($placeholderOption ?? true))
            <option selected disabled>{{ $label }}</option>
        @endif
        {{ $slot }}
    </select>
    @error($attributes->get('name'))
        <p class="text-red-500 mt-1">{{ $message }}</p>
    @enderror

</div>
