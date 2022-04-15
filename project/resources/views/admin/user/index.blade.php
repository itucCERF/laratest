<x-app-layout>
    @section('title', 'Users')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="container">
        <x-auth-session-status class="mb-3" :status="session('status')" />
        <div class="text-end mb-4">
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-success">{{ __('New User') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-stripped table-light table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('No') }}</th>
                        <th>{{ __('User Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th class="text-center">{{ __('Roles') }}</th>
                        <th>{{ __('Address') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @if($users->count() > 0)
                        @php
                            $current_page = $users->currentPage();
                            $perpage = $users->perPage();
                        @endphp
                        @foreach($users as $user)                    
                            <tr>
                                <td class="text-center">{{ $perpage * ($current_page - 1) + $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">{{ $user->roles() ? implode(', ', $user->roles()->pluck('name')->toArray()) : '' }}</td>
                                <td>{{ $user->address }}</td>
                                <td class="d-flex align-item-center justify-content-center">
                                    <a href="{{ route('admin.users.edit', $user) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="post">
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
                            <td colspan="6" class="text-center">{{ __('Don\'t have any users!') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
