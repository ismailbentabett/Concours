<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 grid gap-4 sm:grid-cols-12">
        <div class="col-span-12 sm:col-span-4 ">
            <div class="bg-concgreen-600 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg">
                <section aria-labelledby="profile-overview-title ">
                    <div class="overflow-hidden rounded-lg bg-concgreen-600 shadow">
                        <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                        <div class="bg-concgreen-600 p-6">
                            <div class="text-white">

                                <div class="">
                                    <form id="profileForm" action="{{ route('user.upload') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="flex justify-center flex-shrink-0">
                                            <div class="relative w-40 overflow-hidden rounded-full lg:block">
                                                @if (Auth::user()->avatar)
                                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                                    class="relative h-40 w-40 rounded-full" alt="" />

                                                @else
                                                    <img class="relative h-40 w-40 rounded-full"
                                                     src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                                                        alt="" />
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

                                    <div class="flex justify-center py-5">
                                        <div class="flex-row justify-center items-center text-center ">
                                            <p class="text-sm font-medium text-white">Welcome back,</p>
                                            <p class="text-xl font-bold text-white sm:text-2xl">{{ Auth::user()->name }}
                                            </p>
                                            <p class="text-sm font-medium text-white">{{ Auth::user()->email }}

                                        </div>
                                    </div>

                                </div>
                                <div class="mt-5 flex justify-center sm:mt-0">
                                    <!-- This example requires Tailwind CSS v2.0+ -->
                                    <a href="#" class="flex-shrink-0 group block">
                                        <div class="flex items-center">
                                            <div>

                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="h-16 w-16 text-red-500">
                                                    <path
                                                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                                </svg>

                                            </div>
                                            <div class="ml-1">
                                                <p class="text-3xl font-medium text-white group-hover:text-white">
                                                    11K
                                                </p>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div
                            class="grid grid-cols-1 divide-y  divide-white border-t border-gray-600 bg-concgreen-600  sm:divide-x sm:divide-y-0">
                            <a href="{{ route('user.concours') }}"
                                class="text-bittersweet-100 hover:bg-concgreen-500 group flex items-center justify-center px-2 py-10 text-base font-medium rounded-md
    @if (Route::currentRouteName() === 'user.concours') bg-concgreen-500 @endif">

                                <!-- Heroicon name: outline/users -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-bittersweet-300"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                    <path fill-rule="evenodd"
                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                        clip-rule="evenodd" />
                                </svg>

                                Concours
                            </a>
                            <a href="{{ route('user.posts') }}"
                                class="text-bittersweet-100 hover:bg-concgreen-500 group flex items-center justify-center px-2 py-10 text-base font-medium rounded-md
@if (Route::currentRouteName() === 'user.posts') bg-concgreen-500 @endif">
                                <!-- Heroicon name: outline/users -->
                                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-bittersweet-300"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M4.125 3C3.089 3 2.25 3.84 2.25 4.875V18a3 3 0 003 3h15a3 3 0 01-3-3V4.875C17.25 3.839 16.41 3 15.375 3H4.125zM12 9.75a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H12zm-.75-2.25a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5H12a.75.75 0 01-.75-.75zM6 12.75a.75.75 0 000 1.5h7.5a.75.75 0 000-1.5H6zm-.75 3.75a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5H6a.75.75 0 01-.75-.75zM6 6.75a.75.75 0 00-.75.75v3c0 .414.336.75.75.75h3a.75.75 0 00.75-.75v-3A.75.75 0 009 6.75H6z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M18.75 6.75h1.875c.621 0 1.125.504 1.125 1.125V18a1.5 1.5 0 01-3 0V6.75z" />
                                </svg>

                                Posts
                            </a>


                        </div>
                    </div>
                </section>

            </div>
        </div>
        <div class="col-span-12 sm:col-span-8">
            <div class="bg-concgreen-600 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
