<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Concours') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg-gray-900 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    <div class="space-y-6">
                        <div class="bg-bg-gray-900 shadow px-4 py-5 sm:rounded-lg sm:p-6">
                            <div class="md:grid md:grid-cols-3 md:gap-6">
                                <div class="md:col-span-1">
                                    <h3 class="text-lg font-medium leading-6 text-white">Inscription au concours</h3>
                                    <p class="mt-1 text-sm text-slate-400">
                                        Concours Fashion Book Paris.
                                    </p>
                                </div>
                                <div class="mt-5 md:mt-0 md:col-span-2">

                                        <form class="relative"   action="{{ route('concour.submit') }}" method="POST"  enctype="multipart/form-data">

                                            @csrf


                                        <div>
                                            <label for="location" class="block text-sm font-medium bg-gray-8000">Vous
                                                etes
                                                ?</label>
                                            <select id="profession" name="profession"
                                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-bittersweet-500 focus:border-bittersweet-500 sm:text-sm rounded-md bg-gray-900">
                                                <option>Professional</option>
                                                <option selected>Artisan</option>
                                                <option>Rather Not Say</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="location"
                                                class="block text-sm font-medium bg-gray-8000">Category</label>
                                            <select id="category_id" name="category_id"
                                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-bittersweet-500 focus:border-bittersweet-500 sm:text-sm rounded-md bg-gray-900">
                                                @foreach ($categories as $category)

                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div>
                                            <label class="block text-sm font-medium bg-gray-8000">
                                                Cover photo
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                        fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="image"
                                                            class="relative cursor-pointer bg-gray-900 rounded-md font-medium text-bittersweet-600 hover:text-bittersweet-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-bittersweet-500">
                                                            <span>Upload a file</span>
                                                            <input id="image" name="image" type="file"
                                                                class="sr-only">
                                                        </label>
                                                        <p class="pl-1">or drag and drop</p>
                                                    </div>
                                                    <p class="text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 10MB
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end">

                                            <button type="submit"
                                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-bg-gray-900 bg-bittersweet-600 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- categories --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg-gray-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-100">
                    <div class="bg-gray-800">
                        <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
                            <div class="space-y-12">
                                <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                                        Categories</h2>
                                    <p class="text-xl text-white">Odio nisi, lectus dis nulla. Ultrices maecenas
                                        vitae rutrum dolor ultricies donec risus sodales. Tempus quis et.</p>
                                </div>
                                <ul role="list"
                                    class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">
                                    @foreach (range(1, 6) as $i)
                                        <li>
                                            <div class="space-y-4">
                                                <div class="aspect-w-3 aspect-h-2">
                                                    <img class="object-cover 1-lg rounded-lg"
                                                        src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                        alt="">
                                                </div>

                                                <div class="space-y-2">
                                                    <div class="text-lg leading-6 font-medium space-y-1">
                                                        <h3>Lindsay Walton</h3>
                                                        <p class="text-bittersweet-600">Front-end Developer</p>
                                                    </div>
                                                    <ul role="list" class="flex space-x-5">
                                                        <li>
                                                            <a href="#" class="text-white hover:text-white">
                                                                <span class="sr-only">Twitter</span>
                                                                <svg class="w-5 h-5" fill="currentColor"
                                                                    viewBox="0 0 20 20" aria-hidden="true">
                                                                    <path
                                                                        d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                                                </svg>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="text-white hover:text-white">
                                                                <span class="sr-only">LinkedIn</span>
                                                                <svg class="w-5 h-5" fill="currentColor"
                                                                    viewBox="0 0 20 20" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
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
            </div>
        </div>

        {{-- top users --}}
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-bg-gray-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-800 dark:text-gray-100">
                        <div class="bg-gray-800">
                            <div class="max-w-7xl mx-auto py-12 px-4 text-center sm:px-6 lg:px-8 lg:py-24">
                                <div class="space-y-12">
                                    <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl">
                                        <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                                            Contestants</h2>
                                        <p class="text-xl text-slate-400">Ornare sagittis, suspendisse in hendrerit
                                            quis.
                                            Sed dui aliquet lectus sit pretium egestas vel mattis neque.</p>
                                    </div>
                                    <ul role="list"
                                        class="mx-auto space-y-16 sm:grid sm:grid-cols-2 sm:gap-16 sm:space-y-0 lg:grid-cols-3 lg:max-w-5xl">
                                        @foreach (range(1, 6) as $i)
                                            <li>
                                                <div class="space-y-6">
                                                    <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
                                                        src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80"
                                                        alt="">
                                                    <div class="space-y-2">
                                                        <div class="text-lg leading-6 font-medium space-y-1">
                                                            <h3>Whitney Francis</h3>
                                                            <p class="text-bittersweet-600">Copywriter</p>
                                                        </div>
                                                        <ul role="list" class="flex justify-center space-x-5">
                                                            <li>
                                                                <a href="#" class="text-white hover:text-white">
                                                                    <span class="sr-only">Twitter</span>
                                                                    <svg class="w-5 h-5" fill="currentColor"
                                                                        viewBox="0 0 20 20" aria-hidden="true">
                                                                        <path
                                                                            d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                                                    </svg>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="text-white hover:text-white">
                                                                    <span class="sr-only">LinkedIn</span>
                                                                    <svg class="w-5 h-5" fill="currentColor"
                                                                        viewBox="0 0 20 20" aria-hidden="true">
                                                                        <path fill-rule="evenodd"
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
                </div>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div
                        class="bg-bg-gray-900 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center">
                        <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-start items-center">

                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <nav aria-label="Progress">
                                <ol role="list" class="overflow-hidden">
                                    <li class="relative pb-10">
                                        <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-bittersweet-600"
                                            aria-hidden="true"></div>
                                        <!-- Complete Step -->
                                        <a href="#" class="relative flex items-start group">
                                            <span class="h-9 flex items-center">
                                                <span
                                                    class="relative z-10 w-8 h-8 flex items-center justify-center bg-bittersweet-600 rounded-full group-hover:bg-bittersweet-800">
                                                    <span class="h-2.5 w-2.5 bg-gray-800 rounded-full"></span>

                                                </span>
                                            </span>
                                            <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 mt-5"
                                                src="{{ URL('image/etapes/1.jpg') }}" alt="">
                                            <span class="ml-4 min-w-0 flex flex-col">
                                                <span class="text-xs font-semibold tracking-wide uppercase">Etap
                                                    1</span>
                                                <span class="text-sm text-gray-500">Vitae sed mi luctus laoreet.</span>
                                            </span>
                                        </a>



                                    </li>

                                    <li class="relative pb-10">
                                        <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-bittersweet-600"
                                            aria-hidden="true"></div>
                                        <!-- Current Step -->
                                        <a href="#" class="relative flex items-start group"
                                            aria-current="step">
                                            <span class="h-9 flex items-center" aria-hidden="true">
                                                <span
                                                    class="relative z-10 w-8 h-8 flex items-center justify-center bg-bittersweet-600 rounded-full group-hover:bg-bittersweet-800">
                                                    <span class="h-2.5 w-2.5 bg-gray-800 rounded-full"></span>

                                                </span>
                                            </span>
                                            <span class="ml-4 min-w-0 flex flex-col">
                                                <span class="text-xs font-semibold tracking-wide uppercase">Etap
                                                    2</span>
                                                <span class="text-sm text-gray-500">Cursus semper viverra facilisis et
                                                    et some
                                                    more.</span>
                                            </span>
                                        </a>
                                        <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 mt-5"
                                            src="{{ URL('image/etapes/2.jpg') }}" alt="">
                                    </li>

                                    <li class="relative pb-10">
                                        <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-bittersweet-600"
                                            aria-hidden="true"></div>
                                        <!-- Upcoming Step -->
                                        <a href="#" class="relative flex items-start group">
                                            <span class="h-9 flex items-center" aria-hidden="true">
                                                <span
                                                    class="relative z-10 w-8 h-8 flex items-center justify-center bg-bittersweet-600 rounded-full group-hover:bg-bittersweet-800">
                                                    <span class="h-2.5 w-2.5 bg-gray-800 rounded-full"></span>

                                                </span>

                                            </span>
                                            <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 mt-5"
                                                src="{{ URL('image/etapes/3.jpg') }}" alt="">
                                            <span class="ml-4 min-w-0 flex flex-col">
                                                <span class="text-xs font-semibold tracking-wide uppercase">Etap
                                                    3</span>
                                                <span class="text-sm text-gray-500">Penatibus eu quis ante.</span>
                                            </span>
                                        </a>

                                    </li>
                                    <li class="relative pb-10">
                                        <div class="-ml-px absolute mt-0.5 top-4 left-4 w-0.5 h-full bg-bittersweet-600"
                                            aria-hidden="true"></div>
                                        <!-- Upcoming Step -->
                                        <a href="#" class="relative flex items-start group">
                                            <span class="h-9 flex items-center" aria-hidden="true">
                                                <span
                                                    class="relative z-10 w-8 h-8 flex items-center justify-center bg-bittersweet-600 rounded-full group-hover:bg-bittersweet-800">
                                                    <span class="h-2.5 w-2.5 bg-gray-800 rounded-full"></span>

                                                </span>
                                            </span>
                                            <span class="ml-4 min-w-0 flex flex-col">
                                                <span class="text-xs font-semibold tracking-wide uppercase">Etap
                                                    4</span>
                                                <span class="text-sm text-gray-500">Penatibus eu quis ante.</span>
                                            </span>
                                        </a>
                                        <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 mt-5"
                                            src="{{ URL('image/etapes/4.jpg') }}" alt="">
                                    </li>



                                </ol>
                            </nav>

                        </div>
                    </div>
                </div>
</x-app-layout>
