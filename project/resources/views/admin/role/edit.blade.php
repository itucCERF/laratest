<x-app-layout>
    @section('title', 'Edit Role')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="mw-50 container mx-auto p-4">
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <x-auth-session-status class="mb-3" :status="session('status')" />
            <x-auth-validation-errors class="mb-3" :errors="$errors" />
            <div class="mb-2">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="mt-1" type="text" name="name" :value="$role->name" required autofocus />
            </div>            
            <div class="text-end">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                <button type="submit" class="btn btn-primary ms-2">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
</x-app-layout>
