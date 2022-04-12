@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-success fs-6']) }}>
        {{ $status }}
    </div>
@endif
