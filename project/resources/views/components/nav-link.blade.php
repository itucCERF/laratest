@props(['active'])

@php
$classes = ($active ?? false)
            ? 'pt-1 me-1 active text-decoration-none fw-bold'
            : 'pt-1 me-1 text-decoration-none';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
