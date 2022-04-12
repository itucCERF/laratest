@props(['value'])

<label {{ $attributes->merge(['class' => 'd-block text-secondary']) }}>
    {{ $value ?? $slot }}
</label>
