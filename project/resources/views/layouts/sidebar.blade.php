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
    <li class="menu-item has-sub {{ request()->routeIs('admin.departments.*') ? 'active' : ''}}">
        <a href="#" onclick="toggleSubmenu(this)">
            {{ __('Departments') }}
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
        <a href="#" onclick="toggleSubmenu(this)">
            {{ __('Members') }}
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
        <a href="#" onclick="toggleSubmenu(this)">
            {{ __('Transitions') }}
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
</ul>