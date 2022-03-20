@props(['type' => 'primary'])

<button {{ $attributes->merge(['class' => $type == "primary" ? 'btn bg-primary-500 text-primary-50 hover:bg-primary-600' : 'btn bg-error-500 text-error-50 hover:bg-error-600']) }}>
    {{ $slot }}
</button>
