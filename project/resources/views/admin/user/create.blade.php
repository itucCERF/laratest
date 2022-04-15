<x-app-layout>
    @section('title', 'Create User')
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Create User') }}
        </h2>
    </x-slot>
    <div class="mw-50 container mx-auto p-4">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <x-auth-session-status class="mb-3" :status="session('status')" />
            <x-auth-validation-errors class="mb-3" :errors="$errors" />
            <div class="mb-2">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="mb-2">
                <x-label for="name" :value="__('User Name')" />
                <x-input id="name" class="mt-1" type="text" name="name" :value="old('name')" required />
            </div>
            <div class="mb-2">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="mt-1"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>
            <div class="mb-2">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="mt-1"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <div class="mb-3">
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="mt-1" type="text" name="address" :value="old('address')" />
            </div>
            <div class="mb-3">
                <x-label for="roles" :value="__('Roles')" />
                <select name="roles[]" id="roles" class="select2 form-control" multiple="multiple">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-end">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                <button type="submit" class="btn btn-primary ms-2">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
</x-app-layout>
