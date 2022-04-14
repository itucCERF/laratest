<x-app-layout>
    <x-slot name="header">
        <h2 class="text-secondary">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-stripped table-light table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('No') }}</th>
                            <th>{{ __('User Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th class="text-center">{{ __('Roles') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    <td></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">{{ __('Don\'t have users yet!') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
