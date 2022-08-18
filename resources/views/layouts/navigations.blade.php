<nav x-data="{ open: false }" class="bg-primary-600 border-b border-gray-100">
    {{-- Primary Navigation Menu --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                {{-- Logo --}}
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex">
                        <x-applications-logo class="block h-10 w-auto fill-current text-gray-600 mr-3" />
                        <span class="self-center text-blue-100 text-lg font-semibold leading-5 whitespace-nowrap">{{ config('app.name', 'App') }}</span>
                    </a>
                </div>

                {{-- Navigation Links --}}
                <div class="hidden space-x-2 sm:-my-px sm:ml-20 sm:flex">

                    <x-navs-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-navs-link>

                    @auth
                    <x-navs-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-navs-link>
                    @endauth
                </div>
            </div>

            {{-- Settings Dropdown --}}
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @guest
                <a href="{{ route('login') }}" class="text-primary-600 bg-white hover:bg-warning-700 leading-5 hover:text-white focus:ring-4 focus:ring-primary-300 text-md font-medium rounded-md text-sm px-4 lg:px-5 py-2 lg:py-2.5 focus:outline-none transition duration-150 ease-in-out">Log in</a>
                @endguest
                <x-dropdowns align="right" width="48">
                    <x-slot name="trigger">
                        @auth
                        <button class="flex items-center text-md font-medium leading-5 text-gray-100 hover:text-warning-700 hover:border-warning-700 focus:outline-none focus:text-blue-900 focus:border-blue-900 transition duration-150 ease-in-out">
                            <div class="overflow-hidden relative w-10 h-10 cursor-pointer bg-primary-50 rounded-full ring-2 hover:ring-2 hover:ring-warning-700 ring-gray-100">
                                <svg class="absolute -left-1 w-12 h-12 text-primary-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                        @endauth
                    </x-slot>

                    <x-slot name="content">
                        @auth
                        <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                        </div>
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <x-dropdown-link href="/admin">
                                    {{ __('Admin Panel') }}
                                </x-dropdown-link>
                            </li>
                            <li>
                                <x-dropdown-link>
                                    {{ __('Settings Profile') }}
                                </x-dropdown-link>
                            </li>
                            <li>
                                <x-dropdown-link>
                                    {{ __('Change Password') }}
                                </x-dropdown-link>
                            </li>
                        </ul>
                        {{-- Authentication --}}
                        <div class="py-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                        @endauth
                    </x-slot>
                </x-dropdowns>
            </div>

            {{-- Hamburger --}}
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:text-primary-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-primary-600 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Responsive Navigation Menu --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-navs-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-navs-link>

            @auth
            <x-responsive-navs-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-navs-link>
            @endauth
            @guest
            <x-responsive-navs-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Log In') }}
            </x-responsive-navs-link>
            @endguest
        </div>

        {{-- Responsive Settings Options --}}
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-100">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-200">{{ Auth::user()->email }}</div>
            </div>

            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                <li>
                    <x-responsive-navs-link href="/admin">
                        {{ __('Admin Panel') }}
                    </x-responsive-navs-link>
                </li>
                <li>
                    <x-responsive-navs-link>
                        {{ __('Settings Profile') }}
                    </x-responsive-navs-link>
                </li>
                <li>
                    <x-responsive-navs-link>
                        {{ __('Change Password') }}
                    </x-responsive-navs-link>
                </li>
            </ul>

            {{-- Authentication --}}
            <div class="mt-1 space-y-1 border-t border-gray-200">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-navs-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-navs-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
