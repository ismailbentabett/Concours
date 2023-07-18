<header class="bg-gray-800"

    x-data="{ opennav: false }"
    @keydown.window.escape="opennav = false"
    >
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-700 lg:px-8">
        <div class="relative h-16 flex justify-between">
            <div class="relative z-10 px-2 flex lg:px-0">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-bittersweet-500.svg"
                        alt="Workflow">
                </div>
            </div>
            <div class="relative z-0 flex-1 px-2 flex items-center justify-center sm:absolute sm:inset-0">
                <div class="w-full sm:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                            <!-- Heroicon name: solid/search -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="search" name="search"
                            class="block w-full bg-gray-700 border border-transparent rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 focus:placeholder-gray-500 sm:text-sm"
                            placeholder="Search" type="search">
                    </div>
                </div>
            </div>
            <div class="relative z-10 flex items-center lg:hidden">
                <!-- Mobile menu button -->



                <button type="button" @click="opennav = ! opennav"
                    class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!--
              Icon when menu is closed.

              Heroicon name: outline/menu

              Menu open: "hidden", Menu closed: "block"
            -->



                    <svg x-show="!opennav" class="md:hidden block h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
              Icon when menu is open.

              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
                    <svg x-show="opennav" class="md:hidden block h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>


            @if (Route::has('login'))

                <div class="space-x-3 z-10 flex items-center">
                    @auth
                    <div class="flex-shrink-0">
                        <a
                            href="{{ url('posts/create') }}"
                        type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          <!-- Heroicon name: solid/plus-sm -->
                          <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                          </svg>
                          <span>New Post</span>
                        </a>
                      </div>

                        <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                            </button>


                            <!-- Profile dropdown -->
                            <div class="flex-shrink-0 relative ml-4" x-data="{ open: false }" @click.outside="open = false"
                                @close.stop="open = false">
                                <div>
                                    <button type="button"
                                        class="bg-gray-800 rounded-full flex text-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                        @click="open = ! open">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="">
                                    </button>
                                </div>

                                <!--
                                                      Dropdown menu, show/hide based on menu state.

                                                      Entering: "transition ease-out duration-100"
                                                        From: "transform opacity-0 scale-95"
                                                        To: "transform opacity-100 scale-100"
                                                      Leaving: "transition ease-in duration-75"
                                                        From: "transform opacity-100 scale-100"
                                                        To: "transform opacity-0 scale-95"
                                                    -->
                                <div x-show="open" style="display: none;" @click="open = false"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-gray-900 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                        id="user-menu-item-2" href="{{ url('user') }}">{{ __('Profile') }}
                                    </a>
                                    <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                        id="user-menu-item-1" href="{{ url('profile') }}">{{ __('Settings') }}</a>


                                    <form method="POST" action="{{ route('logout') }}" class="cursor-pointer">
                                        @csrf

                                        <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                            id="user-menu-item-2" :href="route('logout')"
                                            onclick="event.preventDefault();
                            this.closest('form').submit();">

                                            {{ __('Log Out') }}
                                        </a>

                                    </form>


                                </div>
                            </div>
                        </div>
                    @else
                        @if (Route::current()->getName() !== 'login')
                            <a href="{{ route('login') }}"
                                class="hidden sm:inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-bittersweet-600 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Log
                                in</a>
                        @endif

                        @if (Route::has('register') && Route::current()->getName() !== 'register')
                            <a href="{{ route('register') }}"
                                class=" hidden sm:inline-flex  items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-bittersweet-600 bg-white hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <nav class="hidden lg:py-2 lg:flex lg:space-x-8" aria-label="Global">

            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ url('') }}"
                class="bg-gray-900 text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium"
                aria-current="page">
                ACCUEIL
            </a>

            <a href="{{ url('concours') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                CONCOURS
            </a>

            <a href="{{ url('profiles') }}"
                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                PROFILES
            </a>

            <a class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium "
                href="{{ url('') }}">
                CONTACT
            </a>
        </nav>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <nav class="lg:hidden" aria-label="Global" id="mobile-menu"

        x-show="opennav"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        >
        <div class="pt-2 pb-3 px-2 space-y-1">



            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-900 text-white block rounded-md py-2 px-3 text-base font-medium"
                aria-current="page">ACCUEIL</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium"
                href="{{ url('concours') }}">CONCOURS</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">PROFILES</a>

            <a href="#"
                class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">CONTACT</a>
        </div>









        @if (Route::has('login'))
            <div class="space-x-3 z-10 flex items-center">
                @auth

                    <div class="border-t border-gray-700 pt-4 pb-3">
                        <div class="px-4 flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium text-white">Tom Cook</div>
                                <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                            </div>

                        </div>
                        <div class="mt-3 px-2 space-y-1">

                            <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                id="user-menu-item-2" href="{{ url('user') }}">{{ __('Profile') }}
                            </a>

                            <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                id="user-menu-item-1" href="{{ url('profile') }}">{{ __('Settings') }}</a>


                            <form method="POST" action="{{ route('logout') }}" class="cursor-pointer">
                                @csrf

                                <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2" :href="route('logout')"
                                    onclick="event.preventDefault();
                this.closest('form').submit();">

                                    {{ __('Log Out') }}
                                </a>

                            </form>


                        </div>
                    </div>
                @else
                    @if (Route::current()->getName() !== 'login')
                        <a href="{{ route('login') }}"
                            class="m-5 inline-flex sm:hidden items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-bittersweet-600 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Log
                            in</a>
                    @endif

                    @if (Route::has('register') && Route::current()->getName() !== 'register')
                        <a href="{{ route('register') }}"
                            class="m-5 inline-flex sm:hidden items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-bittersweet-600 bg-white hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Register</a>
                    @endif
                @endauth


        @endif






    </nav>
</header>
