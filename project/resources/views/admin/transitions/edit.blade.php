<x-app-layout>
    @section('title', 'Edit Transition')
    @section('custom_css')
        <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    @endsection
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Edit Transition') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="text-start mb-5">
            <a href="{{ route('admin.transitions.index') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-caret-left-fill me-1"></i>
                {{ __('All Transitions') }}
            </a>
        </div>
        <form action="{{ route('admin.transitions.update', $transition) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <x-auth-session-status class="mb-3" :status="session('status')" />
            <x-auth-validation-errors class="mb-3" :errors="$errors" />
            <div class="row mb-3">
                <div class="col-sm-6">
                    <x-label for="member" :value="__('Member')" />
                    <select id="member" class="mt-1 form-control" name="member_id">
                        @foreach ($members as $key => $value)
                            <option value="{{ $key }}" {{ $key == $transition->member_id ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <x-label for="department" :value="__('Department')" />
                    <select id="department" class="mt-1 form-control" name="department_id">
                        @foreach ($departments as $key => $value)
                            <option value="{{ $key }}" {{ $key == $transition->department_id ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-6">
                    <x-label for="start_date" :value="__('Start Date')" />
                    <x-input id="start_date" class="mt-1" type="date" name="start_date" :value="$transition->start_date" />
                </div>
                <div class="col-sm-6">
                    <x-label for="end_date" :value="__('End Date')" />
                    <x-input id="end_date" class="mt-1" type="date" name="end_date" :value="$transition->end_date" />
                </div>
            </div>
            <div class="mb-3">
                <x-label for="decide" :value="__('Decide Image')" />
                <div class="upload_media">
                    <x-input id="profile" class="mt-1" type="file" name="decided_img"
                    accept="image/gif, image/png, image/jpeg" onchange="readURL(this);" />
                    <img
                        id="show_image"
                        src="{{ $transition->decided_img ? asset('storage/'.$transition->decided_img) : asset('images/no_image.jpg') }}"
                        alt="{{ __('Your Image') }}" />
                </div>
            </div>
            <div class="text-end">
                <a href="{{ route('admin.transitions.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                <button type="submit" class="btn btn-primary ms-2">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
    @section('custom_js')
        <script src="{{ asset('js/media.js') }}" defer></script>
    @endsection
</x-app-layout>
