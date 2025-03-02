<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto px-4 md:px-6 lg:px-8  border-b-4 border-indigo-500">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="lex-shrink-0 flex items-center">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                </div>

                <!-- Site Origin -->
                <div class="space-x-8 -my-px ml-2 flex">
                    <a class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900">
                        {{ __('panel.site_origin') }}
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden md:flex md:items-center md:ml-6">
                <x-dropdown parentClass="absolute right" width="48">

                    <!-- User Info -->
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication LogOut -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('panel.logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>

                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
