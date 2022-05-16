<x-app-layout>
    @section('title', 'Edit Department')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Edit Department') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="text-start mb-5">
            <a href="{{ route('admin.departments.index') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-caret-left-fill me-1"></i>
                {{ __('All Departments') }}
            </a>
        </div>
        <form action="{{ route('admin.departments.update', $department) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <x-auth-session-status class="mb-3" :status="session('status')" />
            <x-auth-validation-errors class="mb-3" :errors="$errors" />
            <div class="mb-2">
                <x-label for="name" :value="__('Name')" />
                <x-input id="name" class="mt-1" type="text" name="name" :value="$department->name" required autofocus />
            </div>
            <div class="mb-2">
                <x-label for="address" :value="__('Address')" />
                <x-input id="address" class="mt-1" type="text" name="address" :value="$department->address" />
            </div>
            <div class="mb-2">
                <x-label for="description" :value="__('Description')" />
                <textarea name="description" id="description" rows="5" class="mt-1 form-control">{{ $department->description }}</textarea>
            </div>
            <div class="text-end">
                <a href="{{ route('admin.departments.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                <button type="submit" class="btn btn-primary ms-2">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
</x-app-layout>
