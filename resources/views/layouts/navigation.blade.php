<nav x-data="{ open: false }" class="bg-white border-b-2 border-b-green-lighter">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 ">
        <div class="flex justify-end h-20">

            <!-- Logo -->
            <div class="flex items-center space-x-5">
                <div>
                    <a id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation"
                       class="text-green mt-2 text-md px-4 text-center inline-flex items-center" type="button">
                        <div>
                            <svg class="h-6 w-6" viewBox="0 0 15 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.79125 15.1071C6.20083 15.5633 6.72664 15.814 7.27222 15.814H7.27302C7.82097 15.814 8.34916 15.5633 8.75953 15.1063C8.97934 14.8635 9.35413 14.8438 9.59688 15.0628C9.84041 15.2818 9.86018 15.6574 9.64116 15.9001C9.00227 16.6094 8.16176 17 7.27302 17H7.27143C6.38506 16.9992 5.54613 16.6086 4.90962 15.8993C4.6906 15.6566 4.71036 15.281 4.9539 15.0628C5.19743 14.843 5.57222 14.8627 5.79125 15.1071ZM7.3116 0C10.8263 0 13.1873 2.7374 13.1873 5.29372C13.1873 6.60865 13.5217 7.16609 13.8768 7.75753C14.2278 8.34107 14.6256 9.00367 14.6256 10.2561C14.3496 13.4561 11.0089 13.717 7.3116 13.717C3.6143 13.717 0.272812 13.4561 1.04659e-05 10.3067C-0.00235107 9.00367 0.39537 8.34107 0.74644 7.75753L0.870377 7.54891C1.17553 7.02445 1.43593 6.45395 1.43593 5.29372C1.43593 2.7374 3.79695 0 7.3116 0ZM7.3116 1.18605C4.54811 1.18605 2.62197 3.35098 2.62197 5.29372C2.62197 6.93758 2.16574 7.69744 1.76249 8.36795C1.43909 8.90642 1.1837 9.33181 1.1837 10.2561C1.31574 11.7474 2.30016 12.531 7.3116 12.531C12.2954 12.531 13.3106 11.7126 13.4419 10.2047C13.4395 9.33181 13.1841 8.90642 12.8607 8.36795C12.4575 7.69744 12.0012 6.93758 12.0012 5.29372C12.0012 3.35098 10.0751 1.18605 7.3116 1.18605Z"
                                      fill="#80848F"/>
                            </svg>

                        </div>
                    </a>

                    <!-- Dropdown menu -->
                    <div id="dropdownInformation"
                         class="hidden z-10 shadow-lg w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                         data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom"
                         style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 580px, 0px);">
                        <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                            <div class="font-bold">Your Notifications</div>
                        </div>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center font-bold text-lg text-dark hover:text-green hover:border-light-gray focus:outline-none transition duration-150 ease-in-out">
                                <img src=" {{ Auth::user()->avatar}} " class="w-9 h-9 rounded-full">
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.index')">
                                {{ __('User Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>