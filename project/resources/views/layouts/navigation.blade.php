<nav x-data="{ open: false }" class="bg-light navigation pt-1 pb-1 shadow-sm mb-2">
    <!-- Primary Navigation Menu -->
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <!-- Logo -->
                <div class="me-2">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo id="nav-logo" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="dropdown">
                <button class="d-flex align-items-center text-secondary bg-transparent border-0 dropdown-toggle" id="dropdownMenuNav" data-toggle="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
