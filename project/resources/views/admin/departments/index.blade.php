<x-app-layout>
    @section('title', 'Departments')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <div class="container">
        <x-auth-session-status class="mb-3" :status="session('status')" />
        <div class="text-end mb-4">
            <a href="{{ route('admin.departments.create') }}" class="btn btn-sm btn-success">{{ __('New Department') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-stripped table-light table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('No') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th class="text-center">{{ __('Total Member') }}</th>
                        <th>{{ __('Address') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @if($departments->count() > 0)
                        @php
                            $current_page = $departments->currentPage();
                            $perpage = $departments->perPage();
                        @endphp
                        @foreach($departments as $department)                    
                            <tr>
                                <td class="text-center">{{ $perpage * ($current_page - 1) + $loop->iteration }}</td>
                                <td>{{ $department->name }}</td>
                                <td class="text-center">{{ $department->transitions_count }}</td>
                                <td>{{ $department->Address }}</td>
                                <td class="d-flex align-item-center justify-content-center">
                                    <a href="{{ route('admin.departments.all_members', $department) }}" title="{{ __('All Members') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.departments.edit', $department) }}" class="ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.departments.destroy', $department) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="ms-2" title="Delete" data-toggle="tooltip" onclick="this.closest('form').submit();return false;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">{{ __('Don\'t have any departments!') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $departments->links() }}
        </div>
    </div>
</x-app-layout>
