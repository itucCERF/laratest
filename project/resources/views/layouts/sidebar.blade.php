<ul id="main-menu">
    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : ''}}">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <i class="bi bi-box me-1"></i>{{ __('Dashboard') }}
        </x-nav-link>
    </li>
    <li class="menu-item has-sub {{ request()->routeIs('admin.departments.*') ? 'active' : ''}}">
        <a href="#" onclick="toggleSubMenu(this)">
            <span>
                <i class="bi bi-building me-1"></i>
                {{ __('Departments') }}
            </span>
            <i class="bi bi-chevron-down"></i>
        </a>
        <ul class="sub-menu">
            <li>
                <x-nav-link :href="route('admin.departments.index')" :active="request()->routeIs('admin.departments.index')">
                    {{ __('List') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('admin.departments.create')" :active="request()->routeIs('admin.departments.create')">
                    {{ __('Create Department') }}
                </x-nav-link>
            </li>
        </ul>
    </li>
    <li class="menu-item has-sub {{ request()->routeIs('admin.members.*') ? 'active' : ''}}">
        <a href="#" onclick="toggleSubMenu(this)">
            <span>
                <i class="bi bi-people me-1"></i>
                {{ __('Members') }}
            </span>
            <i class="bi bi-chevron-down"></i>
        </a>
        <ul class="sub-menu">
            <li>
                <x-nav-link :href="route('admin.members.index')" :active="request()->routeIs('admin.members.index')">
                    {{ __('List') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('admin.members.create')" :active="request()->routeIs('admin.members.create')">
                    {{ __('Create Member') }}
                </x-nav-link>
            </li>
        </ul>
    </li>
    <li class="menu-item has-sub {{ request()->routeIs('admin.transitions.*') ? 'active' : ''}}">
        <a href="#" onclick="toggleSubMenu(this)">
            <span>
                <i class="bi bi-arrow-left-right me-1"></i>
                {{ __('Transitions') }}
            </span>
            <i class="bi bi-chevron-down"></i>
        </a>
        <ul class="sub-menu">
            <li>
                <x-nav-link :href="route('admin.transitions.index')" :active="request()->routeIs('admin.transitions.index')">
                    {{ __('List') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('admin.transitions.create')" :active="request()->routeIs('admin.transitions.create')">
                    {{ __('Create Transition') }}
                </x-nav-link>
            </li>
        </ul>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : ''}}">
        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
            <i class="bi bi-person-circle me-1"></i>
            {{ __('Users') }}
        </x-nav-link>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.roles.*') ? 'active' : ''}}">
        <x-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
            <i class="bi bi-person-check-fill me-1"></i>
            {{ __('Roles') }}
        </x-nav-link>
    </li>
    <li lass="menu-item">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                <i class="bi bi-box-arrow-right me-1"></i>
                {{ __('Log Out') }}
            </x-nav-link>
        </form>
    </li>
</ul>
<div class="icon-menu-mobile">
    <a onclick="toggleMenu(this)">
        <i class="bi bi-bar-chart-steps"></i>
    </a>
</div>