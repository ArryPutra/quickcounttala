<div {{ $attributes->merge(['class' => 'relative overflow-x-auto max-sm:-mx-4']) }}>
    <table class="w-full text-sm text-left rtl:text-right">
        {{ $slot }}
    </table>
</div>
