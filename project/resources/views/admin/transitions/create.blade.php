<x-app-layout>
    @section('title', 'Create Transition')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Create Transition') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="text-start mb-5">
            <a href="{{ route('admin.transitions.index') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-caret-left-fill me-1"></i>
                {{ __('All Transitions') }}
            </a>
        </div>
        <form action="{{ route('admin.transitions.store') }}" method="POST">
            @csrf
            <x-auth-session-status class="mb-3" :status="session('status')" />
            <x-auth-validation-errors class="mb-3" :errors="$errors" />
            <div class="row mb-2">
                <div class="col-sm-6">
                    <x-label for="member" :value="__('Member')" />
                    <select id="member" class="mt-1 form-control" name="member">
                        @foreach ($members as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <x-label for="department" :value="__('Department')" />
                    <select id="department" class="mt-1 form-control" name="department">
                        @foreach ($departments as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <x-label for="start_date" :value="__('Start Date')" />
                    <x-input id="start_date" class="mt-1" type="date" name="start_date" :value="old('start_date')" />
                </div>
                <div class="col-sm-6">
                    <x-label for="end_date" :value="__('End Date')" />
                    <x-input id="end_date" class="mt-1" type="date" name="end_date" :value="old('end_date')" />
                </div>
            </div>
            <div class="mb-2">
                <x-label for="decide" :value="__('Decide Image')" />
                <x-input id="decide" class="mt-1" type="text" name="decided_img" :value="old('decided_img')" />
            </div>
            <div class="text-end">
                <a href="{{ route('admin.transitions.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                <button type="submit" class="btn btn-primary ms-2">{{ __('Submit') }}</button>
            </div>
        </form>
    </div>
</x-app-layout>
