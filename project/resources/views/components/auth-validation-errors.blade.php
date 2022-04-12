@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-danger fw-bold fs-6">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-1 text-danger fs-6">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
