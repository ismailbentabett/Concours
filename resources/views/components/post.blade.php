@props(['post', 'user'])



<main class="lg:col-span-9 xl:col-span-6">

    <div class="mt-4">
        <ul role="list" class="space-y-4">
            <li class="bg-concgreen-500 px-4 py-6 shadow sm:p-6 sm:rounded-lg">
                <article aria-labelledby="question-title-81614">
                    <div>
                        <div class="flex space-x-3 mb-5">
                            <div class="flex-shrink-0">
                                @if ($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}"
                                    class="h-10 w-10 rounded-full" alt="" />
                            @else
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                                    alt="" />
                            @endif

                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-white">
                                    <a href="#" class="hover:underline">{{ $user->name }}</a>
                                </p>
                                <p class="text-sm text-white">
                                    <a href="#" class="hover:underline">
                                        <time datetime="2020-12-09T11:43:00">{{ $post->created_at }}</time>
                                    </a>
                                </p>
                            </div>

                            <div class="flex-shrink-0 self-center flex" x-data="{ open: false }"
                                @click.outside="open = false" @close.stop="open = false">
                                <div class="relative inline-block text-left">
                                    <div>
                                        <button @click="open = ! open" type="button"
                                            class="-m-2 p-2 rounded-full flex items-center text-white hover:text-gray-600"
                                            id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <!-- Heroicon name: solid/dots-vertical -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div x-show="open" style="display: none;" @click="open = false"
                                        class="z-50 origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-concgreen-500 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                        role="menu" aria-orientation="vertical"
                                        aria-labelledby="options-menu-0-button" tabindex="-1">
                                        <div class="py-1" role="none">
                                            <!-- Active: "bg-gray-100 text-white", Not Active: "text-white" -->
                                            <a href="#" class="text-white flex px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                                <!-- Heroicon name: solid/star -->
                                                <svg class="mr-3 h-5 w-5 text-white"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                                <span>Add to favorites</span>
                                            </a>
                                            <a href="#" class="text-white flex px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1" id="options-menu-0-item-1">
                                                <!-- Heroicon name: solid/code -->
                                                <svg class="mr-3 h-5 w-5 text-white"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span>Embed</span>
                                            </a>
                                            <a href="#" class="text-white flex px-4 py-2 text-sm"
                                                role="menuitem" tabindex="-1" id="options-menu-0-item-2">
                                                <!-- Heroicon name: solid/flag -->
                                                <svg class="mr-3 h-5 w-5 text-white"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span>Report content</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- img --}}
                        @if (count($post->images) > 1)

                            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                    @foreach ($post->images as $slide)

                                        <!-- Item 1 -->
                                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                            <img src="{{ asset('storage/' . $slide['url']) }}"
                                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                alt="...">
                                        </div>

                                        <!-- Item 6 -->
                                    @endforeach
                                </div>

                                <!-- Slider controls -->
                                <button type="button"
                                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-prev>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-concgreen-600/30 group-hover:bg-white/50 dark:group-hover:bg-concgreen-600/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button"
                                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                    data-carousel-next>
                                    <span
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-concgreen-600/30 group-hover:bg-white/50 dark:group-hover:bg-concgreen-600/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>

                        @elseif (count($post->images) == 1)
                            <div class="relative w-full">
                                <img src="{{ asset('storage/' . $post->images[0]['url']) }}"
                                    class="w-full h-96 object-cover rounded-lg"
                                    alt="...">
                            </div>


                        @endif



                        <h2 id="question-title-81614" class="mt-4 text-base font-medium text-white">
                            {{ $post->title }} {{ count($post->images) }}


                        </h2>
                    </div>
                    <div>
                        <div class="z-50">

                        </div>
                    </div>

                    <div class="mt-2 text-sm text-white space-y-4">
                        {{ $post->content }}
                    </div>
                    <div class="mt-6 flex justify-between space-x-8">
                        <div class="flex space-x-6">
                            <span class="inline-flex items-center text-sm">
                                <button type="button"
                                    class="inline-flex space-x-2 text-white hover:text-gray-500">
                                    <!-- Heroicon name: solid/thumb-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>

                                    <span class="font-medium text-white">29</span>
                                    <span class="sr-only">likes</span>
                                </button>
                            </span>

                            <span class="inline-flex items-center text-sm">
                                <button type="button"
                                    class="inline-flex space-x-2 text-white hover:text-gray-500">
                                    <!-- Heroicon name: solid/eye -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="font-medium text-white">2.7k</span>
                                    <span class="sr-only">views</span>
                                </button>
                            </span>
                        </div>

                    </div>
                </article>
            </li>

            <!-- More questions... -->
        </ul>
    </div>
</main>
