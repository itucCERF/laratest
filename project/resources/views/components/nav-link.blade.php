@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-1 pt-1 text-primary text-decoration-none'
            : 'px-1 pt-1 text-secondary text-decoration-none';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
