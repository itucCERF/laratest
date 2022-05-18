<x-app-layout>
    @section('custom_css')
        <link rel="stylesheet" href="{{ asset('css/media.css') }}">
    @endsection
    @section('title', 'Create Member')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Create Member') }}
        </h2>
    </x-slot>
    @php
        $genders = config('constant.gender');
    @endphp
    <div class="container mx-auto p-4">
        <div class="text-start mb-5">
            <a href="{{ route('admin.members.index') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-caret-left-fill me-1"></i>
                {{ __('All members') }}
            </a>
        </div>
        <form action="{{ route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-auth-session-status class="mb-3" :status="session('status')" />
            <x-auth-validation-errors class="mb-3" :errors="$errors" />
            <div class="mb-3">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="mt-1" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <div class="mb-3">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="mt-1" type="email" name="email" :value="old('email')" />
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <x-label for="gender" :value="__('Gender')" />
                    <select id="gender" class="mt-1 form-control" name="gender">
                        @foreach ($genders as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <x-label for="birthday" :value="__('Birthday')" />
                    <x-input id="birthday" class="mt-1" type="date" name="birthday" :value="old('birthday')" />
                </div>
            </div>
            <div class="mb-3">
                <x-label for="profile" :value="__('Profile')" />
                <div class="upload_media">
                    <x-input id="profile" class="mt-1" type="file" name="profile"
                    accept="image/gif, image/png, image/jpeg" onchange="readURL(this);" />
                    <img id="show_image" src="{{ asset('images/no_image.jpg') }}" alt="{{ __('Your Image') }}" />
                </div>
            </div>
            <div class="mb-3">
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="mt-1" type="text" name="address" :value="old('address')" />
            </div>
            <div class="mb-3">
                <x-label for="id_card" :value="__('ID Card')" />
                <x-input id="id_card" class="mt-1" type="text" name="id_card" :value="old('id_card')" />
            </div>
            <div class="mb-3">
                <x-label for="notes" :value="__('Notes')" />
                <textarea name="notes" id="notes" cols="30" rows="5" class="form-control">{{ old('notes') }}</textarea>
            </div>
            <div class="text-end">
                <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                <button type="submit" class="btn btn-primary ms-2">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
    @section('custom_js')
        <script src="{{ asset('js/media.js') }}" defer></script>
    @endsection
</x-app-layout>
