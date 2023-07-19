<header class="bg-concgreen-700" x-data="{ opennav: false }" @keydown.window.escape="opennav = false">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-700 lg:px-8">
        <div class="relative h-16 flex justify-between">
            <div class="relative z-10 px-2 flex lg:px-0">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/')  }}">
                        <svg id="logo-54" width="170" height="41" viewBox="0 0 170 41" fill="none"
                            xmlns="http://www.w3.org/2000/svg">


                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M20.6841 40.138C31.7298 40.138 40.6841 31.1837 40.6841 20.138C40.6841 9.09234 31.7298 0.138031 20.6841 0.138031C9.63837 0.138031 0.684082 9.09234 0.684082 20.138C0.684082 31.1837 9.63837 40.138 20.6841 40.138ZM26.9234 9.45487C27.2271 8.37608 26.1802 7.73816 25.2241 8.41933L11.8772 17.9276C10.8403 18.6663 11.0034 20.138 12.1222 20.138L15.6368 20.138V20.1108H22.4866L16.9053 22.0801L14.4448 30.8212C14.1411 31.9 15.1879 32.5379 16.1441 31.8567L29.491 22.3485C30.5279 21.6098 30.3647 20.138 29.246 20.138L23.9162 20.138L26.9234 9.45487Z"
                                class="ccustom" fill="#F15757"></path>
                        </svg>
                    </a>

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
                            class="block w-full bg-concgreen-700 border border-transparent rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 focus:placeholder-gray-500 sm:text-sm"
                            placeholder="Search" type="search">
                    </div>
                </div>
            </div>



            @if (Route::has('login'))

                <div class="space-x-3 z-10 flex items-center">
                    <div class="relative z-50 flex items-center ">
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
                    @auth
                        <div class="hidden lg:flex flex-shrink-0">
                            <a href="{{ url('posts/create') }}" type="button"
                                class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-bittersweet-400 shadow-sm hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">
                                <!-- Heroicon name: solid/plus-sm -->
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>New Post</span>
                            </a>
                        </div>

                        <div class="hidden md:relative md:z-10 md:ml-4 md:flex md:items-center">
                            <a
                            href="{{ url('user') }}"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-concgreen-600 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                        </a>


                            <!-- Profile dropdown -->
                            <div class="flex-shrink-0 relative ml-4" x-data="{ open: false }" @click.outside="open = false"
                                @close.stop="open = false">
                                <div>
                                    <button type="button"
                                        class="bg-concgreen-600 rounded-full flex text-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                        @click="open = ! open">
                                        <span class="sr-only">Open user menu</span>
                                        @if (Auth::user()->avatar)
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                            class="h-8 w-8 rounded-full" alt="" />

                                        @else
                                            <img class="h-8 w-8 rounded-full"
                                             src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                                                alt="" />
                                        @endif
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
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-concgreen-500 ring-1 ring-black ring-opacity-5 focus:outline-none"
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
                                class="hidden sm:inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-bittersweet-400 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Log
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

            <!-- Current: "bg-concgreen-500 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ url('') }}"
            @class([
                'bg-concgreen-500 text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' => Request::is('/') || Request::is('accueil'),
                'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' => !Request::is('/') && !Request::is('accueil')
            ])
            aria-current="page">
            ACCUEIL
        </a>


        <a href="{{ url('concours') }}"
        @class([
            'bg-concgreen-500 text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' => Request::is('/concours') || Request::is('concours'),
            'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' => !Request::is('/concours') && !Request::is('concours')
        ])
        aria-current="page">
                CONCOURS
            </a>

            @auth


            <a href="{{ url('profiles') }}"
            @class([
                'bg-concgreen-500 text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' => Request::is('/profiles') || Request::is('profiles'),
                'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' => !Request::is('/profiles') && !Request::is('profiles')
            ])
            aria-current="page">
                PROFILES
            </a>
        @endauth
            <a href="{{ url('') }}"
            @class([
                'bg-concgreen-500 text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' => Request::is('/') || Request::is('accueil'),
                'text-gray-300 hover:bg-gray-700 hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' => !Request::is('/') && !Request::is('accueil')
            ])
            aria-current="page">
                CONTACT
            </a>
        </nav>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <nav class="lg:hidden" aria-label="Global" id="mobile-menu" x-show="opennav"
        x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
        <div class="pt-2 pb-3 px-2 space-y-1">



            <!-- Current: "bg-concgreen-500 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ url('') }}"
            @class([
                'bg-concgreen-500 text-white block rounded-md py-2 px-3 text-base font-medium' => Request::is('/') || Request::is('accueil'),
                'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium' => !Request::is('/') && !Request::is('accueil'),
                // Add more classes and conditions as needed
            ])
            aria-current="page">ACCUEIL</a>


        <a
        @class([
            'bg-concgreen-500 text-white block rounded-md py-2 px-3 text-base font-medium' => Request::is('/concours') || Request::is('concours'),
            'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium' => !Request::is('/concours') && !Request::is('concours'),
            // Add more classes and conditions as needed
        ])
            href="{{ url('concours') }}">CONCOURS</a>
            @auth
        <a href="{{ url('profiles') }}"
        @class([
            'bg-concgreen-500 text-white block rounded-md py-2 px-3 text-base font-medium' => Request::is('/profiles') || Request::is('profiles'),
            'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium' => !Request::is('/profiles') && !Request::is('profiles'),
            // Add more classes and conditions as needed
        ])
        >PROFILES</a>
        <div class="flex-shrink-0">
            <a href="{{ url('posts/create') }}" type="button"
                class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-bittersweet-400 shadow-sm hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">
                <!-- Heroicon name: solid/plus-sm -->
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                <span>New Post</span>
            </a>
        </div>
        @endauth
        <a  href="{{ url('') }}"
        @class([
            'bg-concgreen-500 text-white block rounded-md py-2 px-3 text-base font-medium' => Request::is('/') || Request::is('accueil'),
            'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium' => !Request::is('/') && !Request::is('accueil'),
            // Add more classes and conditions as needed
        ])
        >CONTACT</a>

        </div>









        @if (Route::has('login'))
            <div class="space-x-3 z-10 flex items-center">
                @auth

                    <div class="border-t border-gray-700 pt-4 pb-3">
                        <div class="px-4 flex items-center">

                            <div class="flex-shrink-0">
                                @if (Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                    class="h-10 w-10 rounded-full" alt="" />

                                @else
                                    <img class="h-10 w-10 rounded-full"
                                     src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                                        alt="" />
                                @endif
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium text-white">{{
                                    Auth::user()->name
                                    }}</div>
                                <div class="text-sm font-medium text-gray-400">{{
                                    Auth::user()->email
                                    }}</div>
                                    </div>

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
                            class="m-5 inline-flex sm:hidden items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-bittersweet-400 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Log
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
