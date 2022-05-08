<ul id="main-menu">
    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : ''}}">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : ''}}">
        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
            {{ __('Users') }}
        </x-nav-link>
    </li>
    <li class="menu-item {{ request()->routeIs('admin.roles.*') ? 'active' : ''}}">
        <x-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
            {{ __('Roles') }}
        </x-nav-link>
    </li>
    <li class="menu-item has-sub {{ request()->routeIs('admin.roles.*') ? 'active' : ''}}">
        <a href="#" onclick="toggleSubmenu(this)">
            {{ __('Roles') }}
            <i class="bi bi-chevron-down"></i>
        </a>
        <ul class="sub-menu">
            <li>
                <x-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
                    {{ __('Roles') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
                    {{ __('Roles') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.*')">
                    {{ __('Roles') }}
                </x-nav-link>
            </li>
        </ul>
    </li>
</ul>