@props(['type' => 'primary'])

<button {{ $attributes->merge(['class' => 'btn bg-primary-500 text-primary-50 hover:bg-primary-600']) }}>
    {{ $slot }}
</button>
