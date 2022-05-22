<x-app-layout>
    @section('title', 'Member - Transition Histories')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Transition Histories of ') . $member->name }}
        </h2>
    </x-slot>

    <div class="container">
        <x-auth-session-status class="mb-3" :status="session('status')" />
        <div class="d-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('admin.members.index') }}" class="btn btn-sm btn-primary me-3">
                <i class="bi bi-caret-left-fill me-1"></i>
                {{ __('All members') }}
            </a>
            <a href="{{ route('admin.members.export_csv', $member) }}" class="btn btn-sm btn-success" target="_blank">
                <i class="bi bi-download ms-2"></i>
                {{ __('Export CSV') }}
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-stripped table-light table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('No') }}</th>
                        <th>{{ __('Department') }}</th>
                        <th class="text-center">{{ __('Start Date') }}</th>
                        <th class="text-center">{{ __('End Date') }}</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @if($transitions->count() > 0)
                        @php
                            $current_page = $transitions->currentPage();
                            $perpage = $transitions->perPage();
                        @endphp
                        @foreach($transitions as $transition)                    
                            <tr>
                                <td class="text-center">{{ $perpage * ($current_page - 1) + $loop->iteration }}</td>
                                <td>{{ $transition->department->name }}</td>
                                <td class="text-center">{{ $transition->start_date }}</td>
                                <td class="text-center">{{ $transition->end_date }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">{{ __('Don\'t have any transitions!') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $transitions->links() }}
        </div>
    </div>
</x-app-layout>
