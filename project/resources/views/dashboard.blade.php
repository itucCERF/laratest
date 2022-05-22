<x-app-layout>
    @section('title', 'Dashboard')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container dashboard">
        <div class="row mb-4 align-items-center">
            <div class="col-sm-6 p-5">
                <div class="box d-flex align-items-center justify-content-between bg-success p-5 text-white shadow rounded">
                    <img src="{{ asset('images/members.png') }}" alt="">
                    <div class="d-flex align-items-center flex-column justify-content-center text-center">
                        <h2>{{ $member_count . __(' members') }}</h2>
                        <a href="{{ route('admin.members.index') }}" class="text-white" target="_blank">{{ __('View All') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 p-5">
                <div class="box d-flex align-items-center justify-content-between bg-primary p-5 text-white shadow rounded">
                    <img src="{{ asset('images/department.png') }}" alt="">
                    <div class="d-flex align-items-center flex-column justify-content-center text-center">
                        <h2>{{ $departments->count() . __(' department') }}</h2>
                        <a href="{{ route('admin.departments.index') }}" class="text-white" target="_blank">{{ __('View All') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="box shadow rounded border p-3 mb-4 bg-light">
            <ul class="list-transitions">
                @foreach($transitions as $transition)
                    <li>
                        <a href="{{ route('admin.transitions.index') }}">
                            <b>{{ $transition->member->name }}</b>
                            {{ __(' had transferred to ') }}
                            <b>{{ $transition->department->name }}</b>
                            {{ __( ' from ') . $transition->start_date . __(' to ') . $transition->end_date }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="row mb-2">
            @foreach ($departments as $department)
                <div class="col-sm-4">
                    <div class="box text-center bg-primary p-4 text-white shadow rounded">
                        <a href="{{ route('admin.departments.all_members', $department) }}" class="box-overlay" target="_blank"></a>
                        <h3>
                            {{ $department->name }}
                        </h3>
                        <h5>{{ __('has ') . $department->countCurrentMember() . __(' members') }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
