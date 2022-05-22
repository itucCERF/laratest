<x-app-layout>
    @section('title', 'Department - All Members')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('All Members of ') . $department->name }}
        </h2>
    </x-slot>

    <div class="container">
        <x-auth-session-status class="mb-3" :status="session('status')" />
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('admin.departments.index') }}" class="btn btn-sm btn-primary me-3">
                <i class="bi bi-caret-left-fill me-1"></i>
                {{ __('All Departments') }}
            </a>
            <a href="{{ route('admin.departments.export_csv', $department) }}" class="btn btn-sm btn-success" target="_blank">
                <i class="bi bi-download ms-2"></i>
                {{ __('Export CSV') }}
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-stripped table-light table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('No') }}</th>
                        <th>{{ __('Member Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Birthday') }}</th>
                        <th>{{ __('Address') }}</th>
                        <th>{{ __('ID Card') }}</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @if($members->count() > 0)
                        @php
                            $current_page = $members->currentPage();
                            $perpage = $members->perPage();
                        @endphp
                        @foreach($members as $member)                    
                            <tr>
                                <td class="text-center">{{ $perpage * ($current_page - 1) + $loop->iteration }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->birthday }}</td>
                                <td>{{ $member->address }}</td>
                                <td>{{ $member->id_card }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">{{ __('Don\'t have any members!') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $members->links() }}
        </div>
    </div>
</x-app-layout>
