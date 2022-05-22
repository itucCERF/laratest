<x-app-layout>
    @section('title', 'Members')
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('Members') }}
        </h2>
    </x-slot>

    <div class="container">
        <x-auth-session-status class="mb-3" :status="session('status')" />
        <div class="text-end mb-4">
            <a href="{{ route('admin.members.create') }}" class="btn btn-sm btn-success">{{ __('New member') }}</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-stripped table-light table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('No') }}</th>
                        <th>{{ __('Member Name') }}</th>
                        <th>{{ __('Current Department') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Address') }}</th>
                        <th>{{ __('ID Card') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
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
                                <td>{{ $member->currentDepartment() ? $member->currentDepartment()->name : '' }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->address }}</td>
                                <td>{{ $member->id_card }}</td>
                                <td class="d-flex align-item-center justify-content-center">
                                    <a href="{{ route('admin.members.history', $member) }}" title="{{ __('Transitions History') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.members.edit', $member) }}" class="ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.members.destroy', $member) }}" method="post">
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
                            <td colspan="6" class="text-center">{{ __('Don\'t have any members!') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $members->links() }}
        </div>
    </div>
</x-app-layout>
