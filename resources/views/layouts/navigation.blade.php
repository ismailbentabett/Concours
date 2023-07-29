@auth
    @php
        $user = App\Models\User::find(Auth::user()->id);
        $admin = $user->isAdmin();

    @endphp
@endauth


<header @class ([
    'transition ease-linear duration-700 fadeIn 2s ease-in forwards navbar bg-transparent fixed z-50 w-screen' =>
        Request::is('/') || Request::is('accueil'),
    'navbar bg-concgreen-700 fadeIn 2s ease-in forwards fixed z-50 w-screen' =>
        !Request::is('/') && !Request::is('accueil'),
]) x-data="{ opennav: false }" @keydown.window.escape="opennav = false" id="navbar">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex items-center px-2 lg:px-0">
                <div class="relative z-10 px-2 flex lg:px-0">

                    <div class="flex-shrink-0 flex items-center">
                        <div @class([
                            'block' => str_contains(request()->path(), 'dashboard'),
                            'hidden' => !str_contains(request()->path(), 'dashboard'),
                        ])>


                            <button data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                                aria-controls="drawer-navigation"
                                class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                aria-controls="dashboard-menu" aria-expanded="false">
                                <span class="sr-only">Open dashboard menu</span>



                                <svg x-show="!opennav" class=" block h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>

                                {{--   <svg x-show="opennav" class="lg:hidden block h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg> --}}
                            </button>
                        </div>
                        <a href="{{ url('/') }}">
                            <h1 class="font-bold text-xl text-white hover:text-yellow-500">
                                Concours De Mode
                            </h1>
                        </a>

                    </div>
                </div>
                <div class="hidden lg:block lg:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ url('') }}" @class([
                            ' text-yellow-500 rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' =>
                                Request::is('/') || Request::is('accueil'),
                            'text-gray-300 hover:bg-gray-700 hover:text-yellow-500  rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' =>
                                !Request::is('/') && !Request::is('accueil'),
                        ]) aria-current="page">
                            ACCUEIL
                        </a>


                        <a href="{{ url('concours') }}" @class([
                            ' text-yellow-500 rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' =>
                                Request::is('/concours') || Request::is('concours'),
                            'text-white hover:bg-gray-700 hover:text-yellow-500  rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' =>
                                !Request::is('/concours') && !Request::is('concours'),
                        ]) aria-current="page">
                            CONCOURS
                        </a>

                        @auth


                            <a href="{{ url('profiles') }}" @class([
                                ' text-yellow-500 rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' =>
                                    Request::is('/profiles') || Request::is('profiles'),
                                'text-white hover:bg-gray-700 hover:text-yellow-500  rounded-md py-2 px-3 inline-flex items-center text-sm font-medium' =>
                                    !Request::is('/profiles') && !Request::is('profiles'),
                            ]) aria-current="page">
                                PROFILES
                            </a>
                        @endauth

                    </div>
                </div>
            </div>
            <div class="flex-1 flex justify-center px-2 lg:ml-6 lg:justify-end">
                <div class="max-w-lg w-full lg:max-w-xs">
                    <label for="Recherche" class="sr-only">Recherche</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <!-- Heroicon name: solid/search -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="Recherche" name="Recherche"
                            class="block w-full pl-10 pr-3 py-2 border border-transparent rounded-md leading-5 bg-concgreen-700 text-gray-300 placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 sm:text-sm"
                            placeholder="Recherche" type="Recherche">
                    </div>
                </div>
            </div>
            <div class="flex lg:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="opennav = ! opennav"
                    class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open menu</span>



                    <svg x-show="!opennav" class="lg:hidden block h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>

                    <svg x-show="opennav" class="lg:hidden block h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:block lg:ml-4">
                <div class="flex items-center">


                    <!-- Profile dropdown -->
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



                                    <svg x-show="!opennav" class="md:hidden block h-6 w-6"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                    <!--
                  Icon when menu is open.

                  Heroicon name: outline/x

                  Menu open: "block", Menu closed: "hidden"
                -->
                                    <svg x-show="opennav" class="md:hidden block h-6 w-6"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
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
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Ajouter un poste</span>
                                    </a>
                                </div>

                                <div class="hidden md:relative md:z-10 md:ml-4 md:flex md:items-center">
                                    <a href="{{ url('user') }}"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white  focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>
                                    </a>


                                    <!-- Profile dropdown -->
                                    <div class="flex-shrink-0 relative ml-4" x-data="{ opendrop: false }"
                                        @keydown.window.escape="opennav = false">
                                        <div>
                                            <button type="button"
                                                class="bg-concgreen-600 rounded-full flex text-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                                id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                                @click="opendrop = ! opendrop">
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
                                        <div x-show="opendrop" x-transition:enter="transition ease-out duration-100"
                                            x-transition:enter-start="transform opacity-0 scale-95"
                                            x-transition:enter-end="transform opacity-100 scale-100"
                                            x-transition:leave="transition ease-in duration-75"
                                            x-transition:leave-start="transform opacity-100 scale-100"
                                            x-transition:leave-end="transform opacity-0 scale-95"
                                            class=" origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-concgreen-500 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                            tabindex="-1">
                                            <!-- Active: "bg-gray-100", Not Active: "" -->
                                            <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                                id="user-menu-item-2" href="{{ url('user') }}">{{ __('Profile') }}
                                            </a>
                                            <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                                id="user-menu-item-1"
                                                href="{{ url('profile') }}">{{ __('Paramètres') }}</a>
                                            @if ($admin)
                                                <a class="block px-4 py-2 text-sm text-white" role="menuitem"
                                                    tabindex="-1" id="user-menu-item-1"
                                                    href="{{ url('dashboard') }}">{{ __('Tableau De bord') }}</a>
                                            @endif
                                            <form method="POST" action="{{ route('logout') }}" class="cursor-pointer">
                                                @csrf

                                                <a class="block px-4 py-2 text-sm text-white" role="menuitem"
                                                    tabindex="-1" id="user-menu-item-2" :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">

                                                    {{ __('Se Déconnecter') }}
                                                </a>

                                            </form>


                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (Route::current()->getName() !== 'login')
                                    <a href="{{ route('login') }}"
                                        class="hidden sm:inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-bittersweet-400 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Connexion</a>
                                @endif

                                @if (Route::has('register') && Route::current()->getName() !== 'register')
                                    <a href="{{ route('register') }}"
                                        class=" hidden sm:inline-flex  items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-bittersweet-600 bg-white hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Inscription</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->

    <!-- Mobile menu, show/hide based on menu state. -->
    <nav class="px-10 lg:hidden bg-concgreen-700 flex justify-between items-start" aria-label="Global"
        id="mobile-menu" x-show="opennav" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95">
        <div class=" py-10 px-2 h-full space-y-1 flex flex-col items-center justify-center  ">



            <!-- Current: "bg-concgreen-500 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ url('') }}" @class([
                'bg-concgreen-500 text-white block rounded-md py-2 px-3 text-base font-medium' =>
                    Request::is('/') || Request::is('accueil'),
                'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium' =>
                    !Request::is('/') && !Request::is('accueil'),
                // Add more classes and conditions as needed
            ]) aria-current="page">ACCUEIL</a>


            <a @class([
                'bg-concgreen-500 text-white block rounded-md py-2 px-3 text-base font-medium' =>
                    Request::is('/concours') || Request::is('concours'),
                'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium' =>
                    !Request::is('/concours') && !Request::is('concours'),
                // Add more classes and conditions as needed
            ]) href="{{ url('concours') }}">CONCOURS</a>
            @auth
                <a href="{{ url('profiles') }}" @class([
                    'bg-concgreen-500 text-white block rounded-md py-2 px-3 text-base font-medium' =>
                        Request::is('/profiles') || Request::is('profiles'),
                    'text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium' =>
                        !Request::is('/profiles') && !Request::is('profiles'),
                    // Add more classes and conditions as needed
                ])>PROFILES</a>

            @endauth


            <div class="flex-shrink-0">
                <a href="{{ url('posts/create') }}" type="button"
                    class="relative inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-bittersweet-400 shadow-sm hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">
                    <!-- Heroicon name: solid/plus-sm -->
                    <svg class="md:-ml-1 md:mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="hidden md:block">Ajouter un poste</span>
                </a>
            </div>

        </div>









        @if (Route::has('login'))
            <div class="space-x-3 z-10 flex-1 flex py-10 items-center justify-between ">
                @auth
                    <div class=" mt-3 px-2 space-y-1 flex flex-col justify-center items-center w-full  ">

                        <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                            id="user-menu-item-2" href="{{ url('user') }}">{{ __('Profile') }}
                        </a>
                        <a class="block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                            id="user-menu-item-1" href="{{ url('profile') }}">{{ __('Paramètres') }}</a>
                        @if ($admin)
                            <a class="hidden break-keep md:block px-4 py-2 text-sm text-white" role="menuitem"
                                tabindex="-1" id="user-menu-item-1"
                                href="{{ url('dashboard') }}">{{ __('Tableau De Bord') }}</a>
                            <a class="block break-keep md:hidden px-4 py-2 text-sm text-white" role="menuitem"
                                tabindex="-1" id="user-menu-item-1"
                                href="{{ url('dashboard') }}">{{ __('T.  D.  B') }}</a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}" class="cursor-pointer">
                            @csrf

                            <a class="break-keep block px-4 py-2 text-sm text-white" role="menuitem" tabindex="-1"
                                id="user-menu-item-2" :href="route('logout')"
                                onclick="event.preventDefault();
            this.closest('form').submit();">

                                {{ __('Déconnecter') }}
                            </a>

                        </form>


                    </div>
                    <div class=" pt-4 pb-3">
                        <div class="px-4 flex items-center">

                            <div class="flex-shrink-0">
                                @if (Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                        class="h-10 w-10 rounded-full" alt="" />
                                @else
                                    <img class="h-10 w-10 rounded-full" src="{{ URL('image/profileplaceholder.jpg') }}"
                                        alt="1" alt="" />
                                @endif
                            </div>
                            <div class="ml-3 hidden ">
                                <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                                <div class="text-sm font-medium text-gray-400 truncate w-20">{{ Auth::user()->email }}
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            @else
                <div class="flex flex-row justify-center items-start flex-wrap">
                    @if (Route::current()->getName() !== 'login')
                        <a href="{{ route('login') }}"
                            class="m-5 inline-flex lg:hidden items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-bittersweet-400 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Connexion
                        </a>
                    @endif

                    @if (Route::has('register') && Route::current()->getName() !== 'register')
                        <a href="{{ route('register') }}"
                            class="m-5 inline-flex lg:hidden items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-bittersweet-600 bg-white hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">Inscription
                        </a>
                    @endif
                </div>

            @endauth


        @endif






    </nav>
</header>
