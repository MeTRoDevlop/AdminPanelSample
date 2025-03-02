<div x-data="{ menu : false }">

    <!-- Hamburger -->
    <button @click="menu = ! menu" class="fixed {{(App::isLocale('fa') ? 'left-2' : 'right-2')}} top-3 z-30 p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out md:hidden">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': menu, 'inline-flex': ! menu }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! menu, 'inline-flex': menu }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <div id="sidebar-disable" @click="menu = ! menu" :class="{'opacity-50 {{(App::isLocale('fa') ? 'right-0' : 'left-0')}}': menu, 'opacity-0 {{(App::isLocale('fa') ? 'right-full' : 'left-full')}}': ! menu }" class="fixed z-20 inset-0 bg-black opacity-50 transition-all duration-300 {{(App::isLocale('fa') ? 'right-full' : 'left-full')}}"></div>

    <!-- Menu -->
    <div id="sidebar" :class="{'translate-x-0 ease-out': menu, '{{(App::isLocale('fa') ? 'translate-x-full' : '-translate-x-full')}} ease-in': ! menu }" class="fixed h-full z-30 inset-y-0 {{(App::isLocale('fa') ? 'right-0' : 'left-0')}} w-65 bg-gray-900 transition duration-300 overflow-y-auto md:translate-x-0 md:static md:inset-0 transform {{(App::isLocale('fa') ? 'translate-x-0' : '-translate-x-full')}} ease-in">

        <!-- Site Title -->
        <div class="flex items-center justify-center mt-4">
            <div class="flex items-center">
                <span class="text-white text-2xl mx-2 font-semibold">{{ __('panel.site_title') }}</span>
            </div>
        </div>

        <!-- Responsive User Info -->
        <div class="flex items-center justify-center text-white my-4 py-2 border-t-2 border-b-2 border-gray-300 border-opacity-50 rounded-2xl md:hidden">
            <i class="fas fa-fw fa-user-tie fa-2x {{(App::isLocale('fa') ? 'ml-2 -mr-2' : '-ml-6 mr-2')}} -mt-1"></i>
            <div class="items-center">
                <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm">{{ Auth::user()->email }}</div>
            </div>
        </div>

        <nav class="mt-4">

            <!-- Dashboard -->
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span class="mx-4">{{ __('panel.dashboard') }}</span>
            </x-nav-link>


            <!-- User Management-->
            @canany(['user_access', 'role_access'])
                <x-dropdown status="stay" parentClass="inherit" contentClass="gray pad" activeRoute="{{ request()->routeIs('admin.users*', 'admin.roles*') ? ' true' : 'false' }}">
                    <x-slot name="trigger">
                        <x-nav-link href="#">
                            <i class="fa-fw fas fa-users"></i>
                            <span class="mx-4">{{ __('panel.userManagement.title') }}</span>
                            <i class="fa fa-caret-down ml-auto" aria-hidden="true"></i>
                        </x-nav-link>
                    </x-slot>

                    <x-slot name="content"  >
                        @can('user_access')
                            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users*')">
                                <i class="fa-fw fas fa-user"></i>
                                <span class="mx-4">{{ __('panel.user.title') }}</span>
                            </x-nav-link>
                        @endcan
                        @can('role_access')
                            <x-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles*')">
                                <i class="fa-fw fas fa-briefcase"></i>
                                <span class="mx-4">{{ __('panel.role.title') }}</span>
                            </x-nav-link>
                        @endcan
                    </x-slot>
                </x-dropdown>
            @endcanany

            <!-- Change Password -->
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('dashboard_password_edit')
                    <x-nav-link :href="route('profile.password.edit')" :active="request()->routeIs('profile.password.edit')">
                        <i class="fa-fw fas fa-key"></i>
                        <span class="mx-4">{{ __('panel.change_password') }}</span>
                    </x-nav-link>
                @endcan
            @endif

            <!-- Authentication LogOut -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                    <i class="fa-fw fas fa-sign-out-alt"></i>
                    <span class="mx-4">{{ __('panel.logout') }}</span>
                </x-nav-link>
            </form>

        </nav>
    </div>
</div>

