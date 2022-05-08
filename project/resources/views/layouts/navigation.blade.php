<nav x-data="{ open: false }" class="bg-dark navigation pt-1 pb-1">
    <div class="ps-3 pe-3">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="text-decoration-none text-light">
                <x-application-logo id="nav-logo" />
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="dropdown">
                <button class="d-flex align-items-center text-light bg-transparent border-0 dropdown-toggle" id="dropdownMenuNav" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ms-1">
                        <svg class="fill-gray" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
dd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuNav">
                    <div class="dropdown-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
