<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profiles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">












                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-bg-gray-900 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <div class="bg-gray-800">
                                        <div class="text-center py-16 px-4 sm:px-6 lg:px-8">
                                            <h1 class="text-4xl font-extrabold tracking-tight text-white">Les
                                                Profiles
                                            </h1>
                                            <p class="mt-4 max-w-xl mx-auto text-base text-gray-500">Lorem ipsum dolor
                                                sit amet consectetur adipisicing elit. Dicta veritatis dolorum error,
                                                provident eligendi asperiores corrupti expedita at commodi unde aperiam
                                                ut nulla doloremque harum. Nulla natus modi quam animi?.</p>
                                        </div>

                                        <!-- Filters -->
                                        <section aria-labelledby="filter-heading"
                                            class="relative z-10 border-t border-b border-gray-200 grid items-center">
                                            <h2 id="filter-heading" class="sr-only">Filters</h2>
                                            <div class="relative col-start-1 row-start-1 py-4">
                                                <div
                                                    class="max-w-7xl mx-auto flex justify-end space-x-6 divide-x divide-gray-200 text-sm px-4 sm:px-6 lg:px-8">
                                                    <div>
                                                        <button type="button "
                                                            class="group text-white font-medium flex items-center"
                                                            aria-controls="disclosure-1" aria-expanded="false">
                                                            <!-- Heroicon name: solid/filter -->
                                                            <svg class="flex-none w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            2 Filters
                                                        </button>
                                                    </div>
                                                    <div class="pl-6">
                                                        <button type="button" class="text-white">Clear all</button>
                                                    </div>

                                                    <div class="">
                                                        <div class="flex justify-end ">
                                                            <div class="relative inline-block">
                                                                <div class="flex">
                                                                    <button type="button"
                                                                        class="group inline-flex justify-center text-sm font-medium text-white hover:text-gray-900"
                                                                        id="menu-button" aria-expanded="false"
                                                                        aria-haspopup="true">
                                                                        Category
                                                                        <!-- Heroicon name: solid/chevron-down -->
                                                                        <svg class="flex-shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 20 20" fill="currentColor"
                                                                            aria-hidden="true">
                                                                            <path fill-rule="evenodd"
                                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                                clip-rule="evenodd" />
                                                                        </svg>
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
                                                                <div class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-2xl bg-gray-900 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                                    role="menu" aria-orientation="vertical"
                                                                    aria-labelledby="menu-button" tabindex="-1">
                                                                    <div class="py-1" role="none">
                                                                        <!--
                          Active: "bg-gray-100", Not Active: ""

                          Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                        -->
                                                                        <a href="#"
                                                                            class="font-medium text-white block px-4 py-2 text-sm"
                                                                            role="menuitem" tabindex="-1"
                                                                            id="menu-item-0">
                                                                            Most Popular
                                                                        </a>

                                                                        <a href="#"
                                                                            class="text-white block px-4 py-2 text-sm"
                                                                            role="menuitem" tabindex="-1"
                                                                            id="menu-item-1">
                                                                            Best Rating
                                                                        </a>

                                                                        <a href="#"
                                                                            class="text-white block px-4 py-2 text-sm"
                                                                            role="menuitem" tabindex="-1"
                                                                            id="menu-item-2">
                                                                            Newest
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>



                                            <div class="border-t border-gray-200 py-10" id="disclosure-1">
                                                <div class="bg-gray-900">
                                                    <div
                                                        class="max-w-7xl mx-auto py-12 px-4 text-center sm:px-6 lg:px-8 lg:py-24">
                                                        <div class="space-y-12">

                                                            <ul role="list"
                                                                class="mx-auto space-y-16 sm:grid sm:grid-cols-2 sm:gap-16 sm:space-y-0 lg:grid-cols-3 lg:max-w-5xl">
                                                                @foreach (range(1, 6) as $i)
                                                                    <li>
                                                                        <div class="space-y-6">
                                                                            <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
                                                                                src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                                                alt="">
                                                                            <div class="space-y-2">
                                                                                <div
                                                                                    class="text-lg leading-6 font-medium space-y-1">
                                                                                    <h3 class="text-white">Whitney
                                                                                        Francis</h3>
                                                                                    <p class="text-bittersweet-600">
                                                                                        Copywriter</p>
                                                                                </div>
                                                                                <ul role="list"
                                                                                    class="flex justify-center space-x-5">
                                                                                    <li>
                                                                                        <a href="#"
                                                                                            class="text-white hover:text-white">
                                                                                            <span
                                                                                                class="sr-only">Twitter</span>
                                                                                            <svg class="w-5 h-5"
                                                                                                fill="currentColor"
                                                                                                viewBox="0 0 20 20"
                                                                                                aria-hidden="true">
                                                                                                <path
                                                                                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                                                                            </svg>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="#"
                                                                                            class="text-white hover:text-white">
                                                                                            <span
                                                                                                class="sr-only">LinkedIn</span>
                                                                                            <svg class="w-5 h-5"
                                                                                                fill="currentColor"
                                                                                                viewBox="0 0 20 20"
                                                                                                aria-hidden="true">
                                                                                                <path
                                                                                                    fill-rule="evenodd"
                                                                                                    d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z"
                                                                                                    clip-rule="evenodd" />
                                                                                            </svg>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach

                                                                <!-- More people... -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
