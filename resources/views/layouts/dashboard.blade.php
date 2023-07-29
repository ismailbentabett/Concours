<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <?php $toastr = Session::get('toastr'); ?>
    @if (isset($toastr) && is_array($toastr))
        <x-toastr :title="$toastr['title']" :message="$toastr['message']" :type="$toastr['type']" />
    @endif
    @php
        $usersCount = App\Models\User::count();
        $postsCount = App\Models\Post::count();
        $concoursCount = App\Models\Concour::count();
        $candidatesCount = App\Models\User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'candidat');
        })->count();
        $inboxCount = App\Models\Message::count();
        
        $users = App\Models\User::withCount(['posts', 'concours'])->get();
        
        foreach ($users as $user) {
            $user->postslikes = $user->posts->sum(function ($post) {
                return $post->likes->count();
            });
        
            $user->concourslikes = $user->concours->sum(function ($concour) {
                return $concour->likes->count();
            });
        
            $user->save();
        }
        
    @endphp
    <div class=" min-h-screen bg-gray-100 dark:bg-concgreen-500">

        <!-- Page Content -->
        <main>

            <div class="min-h-full">

                <nav
                    class="fixed top-0 z-50 w-full bg-concgreen-700 border-b border-gray-200 dark:bg-concgreen-700 dark:border-gray-700">

                    @include('layouts.navigation')

                </nav>
                <div class="grid grid-cols-12  ">
                    <div class="col-span-2">

                    </div>

                    <!-- drawer component -->
                    <div id="drawer-navigation"
                        class="fixed z-50 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-concgreen-700"
                        tabindex="-1" aria-labelledby="drawer-navigation-label">
                        <div class="relative z-10 px-2 flex lg:px-0">
                            <div class="flex-shrink-0 flex items-center">
                                <div class="text-center">

                                    <button data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
                                        class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                        aria-controls="dashboard-menu" aria-expanded="false">
                                        <span class="sr-only">Open dashboard menu</span>

                                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>

                                    </button>
                                </div>
                                <a href="{{ url('/') }}">
                                    <h1 class="font-bold text-xl text-white hover:text-yellow-500">
                                        Concours De Mode
                                    </h1>
                                </a>

                            </div>
                        </div>
                        <div class="py-4 overflow-y-auto">
                            <ul class="space-y-2 font-medium">
                                <li>
                                    <a href="{{ route('dashboard') }}"
                                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 22 21">
                                            <path
                                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                            <path
                                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                        </svg>
                                        <span class="ml-3">Tableau de bord</span>
                                    </a>
                                </li>
                                <li>

                                    <a href="{{ route('admin.inbox.index') }}" @class([
                                        'flex items-center p-2 text-white rounded-lg bg-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() === route('admin.inbox.index'),
                                        'flex items-center p-2 text-white rounded-lg  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() !== route('admin.inbox.index'),
                                    ])>
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Boîte de réception</span>
                                        <span
                                            class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $inboxCount }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.index') }}" @class([
                                        'flex items-center p-2 text-white rounded-lg bg-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() === route('admin.users.index'),
                                        'flex items-center p-2 text-white rounded-lg  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() !== route('admin.users.index'),
                                    ])>
                                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 18">
                                            <path
                                                d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Utilisateurs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.concours.index') }}" @class([
                                        'flex items-center p-2 text-white rounded-lg bg-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() === route('admin.concours.index'),
                                        'flex items-center p-2 text-white rounded-lg  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() !== route('admin.concours.index'),
                                    ])>
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zm1.5 0v1.5c0 .207.168.375.375.375h1.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-1.5A.375.375 0 003 5.625zm16.125-.375a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5A.375.375 0 0021 7.125v-1.5a.375.375 0 00-.375-.375h-1.5zM21 9.375A.375.375 0 0020.625 9h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5a.375.375 0 00.375-.375v-1.5zM4.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5zM3.375 15h1.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h1.5a.375.375 0 00.375-.375v-1.5A.375.375 0 004.875 9h-1.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375zm4.125 0a.75.75 0 000 1.5h9a.75.75 0 000-1.5h-9z"
                                                clip-rule="evenodd" />
                                        </svg>


                                        <span class="flex-1 ml-3 whitespace-nowrap">Participations</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.candidates.index') }}" @class([
                                        'flex items-center p-2 text-white rounded-lg bg-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() === route('admin.candidates.index'),
                                        'flex items-center p-2 text-white rounded-lg  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() !== route('admin.candidates.index'),
                                    ])>
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M3 6a3 3 0 013-3h2.25a3 3 0 013 3v2.25a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm9.75 0a3 3 0 013-3H18a3 3 0 013 3v2.25a3 3 0 01-3 3h-2.25a3 3 0 01-3-3V6zM3 15.75a3 3 0 013-3h2.25a3 3 0 013 3V18a3 3 0 01-3 3H6a3 3 0 01-3-3v-2.25zm9.75 0a3 3 0 013-3H18a3 3 0 013 3V18a3 3 0 01-3 3h-2.25a3 3 0 01-3-3v-2.25z"
                                                clip-rule="evenodd" />
                                        </svg>


                                        <span class="flex-1 ml-3 whitespace-nowrap">Condidats</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.categories.index') }}" @class([
                                        'flex items-center p-2 text-white rounded-lg bg-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() === route('admin.categories.index'),
                                        'flex items-center p-2 text-white rounded-lg  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() !== route('admin.categories.index'),
                                    ])>
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 005.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.879H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"
                                                clip-rule="evenodd" />
                                        </svg>



                                        <span class="flex-1 ml-3 whitespace-nowrap">Catégories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.posts.index') }}" @class([
                                        'flex items-center p-2 text-white rounded-lg bg-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() === route('admin.posts.index'),
                                        'flex items-center p-2 text-white rounded-lg  dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' =>
                                            Request::url() !== route('admin.posts.index'),
                                    ])>
                                        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 003 3h15a3 3 0 01-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125zM12 9.75a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H12zm-.75-2.25a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5H12a.75.75 0 01-.75-.75zM6 12.75a.75.75 0 000 1.5h7.5a.75.75 0 000-1.5H6zm-.75 3.75a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75zM6 6.75a.75.75 0 00-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 00.75-.75v-3A.75.75 0 009 6.75H6z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 01-3 0V6.75z" />
                                        </svg>




                                        <span class="flex-1 ml-3 whitespace-nowrap">Posts</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>

                    <main class="mt-16 col-span-9 w-full ">
                        <div class="bg-concgreen-700 shadow mt-10 hadow rounded-lg">
                            <div class="px-4 sm:px-6 lg:max-w-7xl lg:mx-auto lg:px-8">
                                <div class="py-6 md:flex md:items-center md:justify-between ">
                                    <div class="flex-1 min-w-0">

                                        <!-- Profile -->
                                        <div class="flex items-center">
                                            {{-- Avatar form --}}
                                            <form class="" id="profileForm"
                                                action="{{ route('user.upload') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="flex justify-center flex-shrink-0">
                                                    <div class="relative w-20 overflow-hidden rounded-full lg:block">
                                                        @if (Auth::user()->avatar)
                                                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                                                class="relative h-20 w-20 rounded-full"
                                                                alt="" />
                                                        @else
                                                            <img class="relative h-20 w-20 rounded-full"
                                                                src="{{ URL('image/profileplaceholder.jpg') }}"
                                                                alt="1" alt="" />
                                                        @endif

                                                        <label for="avatar"
                                                            class="absolute inset-0 flex h-full w-full items-center justify-center bg-black bg-opacity-75 text-sm font-medium text-white opacity-0 focus-within:opacity-100 hover:opacity-100">
                                                            <span>Change</span>
                                                            <span class="sr-only">user photo</span>
                                                            <input type="file" name="avatar" id="avatar"
                                                                onchange="form.submit()"
                                                                class="absolute inset-0 h-full w-full cursor-pointer rounded-md border-gray-300 opacity-0" />
                                                        </label>
                                                    </div>
                                                </div>
                                                <button type="submit" style="display: none;"></button>

                                            </form>
                                            <div>
                                                <div class="flex items-center">

                                                    <h1
                                                        class="ml-3 text-2xl font-bold leading-7 text-white sm:leading-9 sm:truncate">
                                                        Bonjour, {{ Auth::user()->name }}
                                                    </h1>
                                                </div>
                                                <dl
                                                    class="text-white mt-6 flex flex-col sm:ml-3 sm:mt-1 sm:flex-row break-all	flex-wrap">
                                                    <dt class="sr-only">Company</dt>
                                                    <dd
                                                        class="flex items-center flex-wrap text-sm text-white font-medium capitalize sm:mr-6">
                                                        <!-- Heroicon name: solid/office-building -->

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor"
                                                            class="flex-shrink-0 mr-1.5 h-5 w-5 text-white hidden md:block">
                                                            <path stroke-linecap="round"
                                                                d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                                                        </svg>

                                                        {{ Auth::user()->email }}
                                                    </dd>

                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">

                                        <a type="button" href="{{ url('/user/concours') }}"
                                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-bittersweet-600 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                            Voir le profil
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="mt-2 grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">
                                    <!-- Card -->
                                    <div class="bg-concgreen-700 overflow-hidden shadow rounded-lg ">
                                        <div class="p-5">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/scale -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 18">
                                                        <path
                                                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                                                    </svg>
                                                </div>
                                                <div class="ml-5 w-0 flex-1">
                                                    <dl>
                                                        <dt class="text-sm font-medium text-white truncate">
                                                            Utilisateurs
                                                        </dt>
                                                        <dd>
                                                            <div class="text-lg font-medium text-white">
                                                                {{ $usersCount }}
                                                            </div>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-concgreen-700 px-5 py-3 ">
                                            <div class="text-sm">
                                                <a href="{{ route('admin.users.index') }}"
                                                    class="font-medium text-bittersweet-700 hover:text-bittersweet-900">
                                                    Voir tous
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-concgreen-700 overflow-hidden shadow rounded-lg ">
                                        <div class="p-5">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/scale -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 18">
                                                        <path
                                                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                                                    </svg>
                                                </div>
                                                <div class="ml-5 w-0 flex-1">
                                                    <dl>
                                                        <dt class="text-sm font-medium text-white truncate">
                                                            Candidats
                                                        </dt>
                                                        <dd>
                                                            <div class="text-lg font-medium text-white">
                                                                {{ $candidatesCount }}
                                                            </div>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-concgreen-700 px-5 py-3 ">
                                            <div class="text-sm">
                                                <a href="{{ route('admin.candidates.index') }}"
                                                    class="font-medium text-bittersweet-700 hover:text-bittersweet-900">
                                                    Voir tous
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-concgreen-700 overflow-hidden shadow rounded-lg ">
                                        <div class="p-5">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/scale -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                                    </svg>

                                                </div>
                                                <div class="ml-5 w-0 flex-1">
                                                    <dl>
                                                        <dt class="text-sm font-medium text-white truncate">
                                                            Posts
                                                        </dt>
                                                        <dd>
                                                            <div class="text-lg font-medium text-white">
                                                                {{ $postsCount }}
                                                            </div>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-concgreen-700 px-5 py-3 ">
                                            <div class="text-sm">
                                                <a href="{{ route('admin.posts.index') }}"
                                                    class="font-medium text-bittersweet-700 hover:text-bittersweet-900">
                                                    Voir tous
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-concgreen-700 overflow-hidden shadow rounded-lg ">
                                        <div class="p-5">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/scale -->
                                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6">
                                                        <path fill-rule="evenodd"
                                                            d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zm1.5 0v1.5c0 .207.168.375.375.375h1.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-1.5A.375.375 0 003 5.625zm16.125-.375a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5A.375.375 0 0021 7.125v-1.5a.375.375 0 00-.375-.375h-1.5zM21 9.375A.375.375 0 0020.625 9h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5a.375.375 0 00.375-.375v-1.5zM4.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h1.5zM3.375 15h1.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-1.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h1.5a.375.375 0 00.375-.375v-1.5A.375.375 0 004.875 9h-1.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375zm4.125 0a.75.75 0 000 1.5h9a.75.75 0 000-1.5h-9z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div class="ml-5 w-0 flex-1">
                                                    <dl>
                                                        <dt class="text-sm font-medium text-white truncate">
                                                            Paricipation au concours
                                                        </dt>
                                                        <dd>
                                                            <div class="text-lg font-medium text-white">
                                                                {{ $concoursCount }}
                                                            </div>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-concgreen-700 px-5 py-3 ">
                                            <div class="text-sm">
                                                <a href="{{ route('admin.concours.index') }}"
                                                    class="font-medium text-bittersweet-700 hover:text-bittersweet-900">
                                                    Voir tous
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div>
                            @yield('content')

                        </div>
                    </main>
                </div>
            </div>
        </main>
        <x-footer />
    </div>

    <x-fab />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>


</body>

</html>
