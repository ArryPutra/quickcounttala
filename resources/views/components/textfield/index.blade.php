<div class="flex flex-col">
    @if (isset($label))
        <label for="{{ $attributes->get('name') }}" class="text-lg">{{ $label }}</label>
        <div class="h-2"></div>
    @endif
    <input id="{{ $attributes->get('name') }}"
        {{ $attributes->merge(['class' => 'bg-gray-100 px-3 py-2 rounded-lg focus:ring-4 outline-none duration-150']) }}>
    @error($attributes->get('name'))
        <p class="text-red-500 mt-1">{{ $message }}</p>
    @enderror
</div>
