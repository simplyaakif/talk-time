<nav x-data="{ open: false }" class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="-ml-2 mr-2 flex items-center md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            aria-controls="mobile-menu" @click="open = !open" aria-expanded="false"
                            x-bind:aria-expanded="open.toString()">
                        <span class="sr-only">Open main menu</span>
                        <svg x-description="Icon when menu is closed.

Heroicon name: outline/menu" x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6"
                             :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg x-description="Icon when menu is open.

Heroicon name: outline/x" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6"
                             :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex-shrink-0 flex items-center">
{{--                    <span class="font-extrabold text-4xl text-org-600">Talk Time</span>--}}
                    <svg width="147" height="28" viewBox="0 0 147 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.08 1.79997V7.34397H12.6V27H6.83999V7.34397H0.359985V1.79997H19.08Z" fill="#FF8A00"/>
                        <path d="M31.255 8.99997H36.655V27H31.255V25.308C29.983 26.772 28.195 27.504 25.891 27.504C23.515 27.504 21.487 26.592 19.807 24.768C18.127 22.92 17.287 20.664 17.287 18C17.287 15.336 18.127 13.092 19.807 11.268C21.487 9.41997 23.515 8.49597 25.891 8.49597C28.195 8.49597 29.983 9.22797 31.255 10.692V8.99997ZM23.875 21.204C24.667 21.996 25.699 22.392 26.971 22.392C28.243 22.392 29.275 21.996 30.067 21.204C30.859 20.412 31.255 19.344 31.255 18C31.255 16.656 30.859 15.588 30.067 14.796C29.275 14.004 28.243 13.608 26.971 13.608C25.699 13.608 24.667 14.004 23.875 14.796C23.083 15.588 22.687 16.656 22.687 18C22.687 19.344 23.083 20.412 23.875 21.204Z" fill="#FF8A00"/>
                        <path d="M40.6167 27V0.719971H46.0167V27H40.6167Z" fill="#FF8A00"/>
                        <path d="M67.2483 27H61.1283L55.3683 19.044V27H49.9683V1.79997H55.3683V16.884L60.7683 8.99997H67.0683L60.5163 18L67.2483 27Z" fill="#FF8A00"/>
                        <path d="M86.3339 1.79997V7.34397H79.8539V27H74.0939V7.34397H67.6139V1.79997H86.3339Z" fill="#FF8A00"/>
                        <path d="M93.6433 6.47997C93.0193 7.10397 92.2633 7.41597 91.3753 7.41597C90.4873 7.41597 89.7193 7.10397 89.0713 6.47997C88.4473 5.83197 88.1353 5.06397 88.1353 4.17597C88.1353 3.28797 88.4473 2.53197 89.0713 1.90797C89.7193 1.25997 90.4873 0.93597 91.3753 0.93597C92.2633 0.93597 93.0193 1.25997 93.6433 1.90797C94.2913 2.53197 94.6153 3.28797 94.6153 4.17597C94.6153 5.06397 94.2913 5.83197 93.6433 6.47997ZM88.6753 27V8.99997H94.0753V27H88.6753Z" fill="#FF8A00"/>
                        <path d="M118.187 8.49597C120.251 8.49597 121.907 9.17997 123.155 10.548C124.403 11.892 125.027 13.692 125.027 15.948V27H119.627V16.416C119.627 15.504 119.399 14.784 118.943 14.256C118.511 13.728 117.875 13.464 117.035 13.464C116.147 13.464 115.451 13.764 114.947 14.364C114.467 14.964 114.227 15.792 114.227 16.848V27H108.827V16.416C108.827 15.504 108.599 14.784 108.143 14.256C107.711 13.728 107.075 13.464 106.235 13.464C105.347 13.464 104.651 13.764 104.147 14.364C103.667 14.964 103.427 15.792 103.427 16.848V27H98.0269V8.99997H103.427V10.656C104.411 9.21597 106.019 8.49597 108.251 8.49597C110.339 8.49597 111.911 9.28797 112.967 10.872C114.071 9.28797 115.811 8.49597 118.187 8.49597Z" fill="#FF8A00"/>
                        <path d="M133.542 20.16C134.166 21.84 135.606 22.68 137.862 22.68C139.326 22.68 140.478 22.224 141.318 21.312L145.638 23.796C143.862 26.268 141.246 27.504 137.79 27.504C134.766 27.504 132.342 26.604 130.518 24.804C128.718 23.004 127.818 20.736 127.818 18C127.818 15.288 128.706 13.032 130.482 11.232C132.282 9.40797 134.586 8.49597 137.394 8.49597C140.01 8.49597 142.182 9.40797 143.91 11.232C145.662 13.032 146.538 15.288 146.538 18C146.538 18.768 146.466 19.488 146.322 20.16H133.542ZM133.434 16.128H141.174C140.646 14.232 139.374 13.284 137.358 13.284C135.27 13.284 133.962 14.232 133.434 16.128Z" fill="#FF8A00"/>
                    </svg>

                </div>
            </div>
            <div class="flex items-center">
                <div class="hidden md:ml-6 md:flex md:space-x-8 mr-4 text-lg">
                    <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                    <x-navbar-menu-item route="#howWorks">How it works</x-navbar-menu-item>
                    <x-navbar-menu-item route="#pricing">Pricing</x-navbar-menu-item>
                    <x-navbar-menu-item route="#about">About Us</x-navbar-menu-item>
                    <x-navbar-menu-item route="#guides">Our Guides</x-navbar-menu-item>
                    <x-navbar-menu-item route="#testimonials">Testimonials</x-navbar-menu-item>

                </div>

                @guest()
                    <div class="flex-shrink-0">
                        <x-navbar-menu-item route="{{route('login')}}">Login</x-navbar-menu-item>
                        <a href="{{route('register')}}" class="relative inline-flex items-center px-4 py-2
                        border
                    border-transparent text-sm font-medium rounded-md text-white bg-org-600 shadow-sm hover:bg-org-700
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-org-500">
                            <span>Make me Fluent</span>
                        </a>
                    </div>
                @endguest
                @auth()
                    <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">

                        <button
                            class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                 aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false"
                             class="ml-3 relative">
                            <div>
                                <button type="button"
                                        class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        id="user-menu" @click="open = !open" aria-haspopup="true"
                                        x-bind:aria-expanded="open">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixqx=6VuxXtg9lB&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                         alt="">
                                </button>
                            </div>

                            <div x-description="Dropdown menu, show/hide based on menu state." x-show="open"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 role="menu" aria-orientation="vertical" aria-labelledby="user-menu" style="display: none;">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Your
                                    Profile</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Settings</a>
                                <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700
                                hover:bg-gray-100"
                                   role="menuitem">
                                    @method('post')
                                    Sign
                                    out</a>
                            </div>

                        </div>
                    </div>

                @endauth

            </div>
        </div>
    </div>

    <div x-description="Mobile menu, show/hide based on menu state." class="md:hidden" id="mobile-menu" x-show="open"
         style="display: none;">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700" -->
            <a href="#"
               class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium sm:pl-5 sm:pr-6">Dashboard</a>
            <a href="#"
               class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium sm:pl-5 sm:pr-6">Team</a>
            <a href="#"
               class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium sm:pl-5 sm:pr-6">Projects</a>
            <a href="#"
               class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium sm:pl-5 sm:pr-6">Calendar</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4 sm:px-6">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixqx=6VuxXtg9lB&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                         alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">Tom Cook</div>
                    <div class="text-sm font-medium text-gray-500">tom@example.com</div>
                </div>
                <button
                    class="ml-auto flex-shrink-0 bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bell" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                </button>
            </div>
            <div class="mt-3 space-y-1">
                <a href="#"
                   class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 sm:px-6">Your
                    Profile</a>
                <a href="#"
                   class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 sm:px-6">Settings</a>
                <a href="#"
                   class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100 sm:px-6">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>
