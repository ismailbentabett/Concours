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
                                    <img src="{{ asset('storage/' . $user->avatar) }}" class="h-10 w-10 rounded-full"
                                        alt="" />
                                @else
                                    <img class="h-10 w-10 rounded-full" src="{{ URL('image/profileplaceholder.jpg') }}"
                                        alt="1" alt="" />
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
                            @if ($user->id == Auth::user()->id)
                                <div class="flex-shrink-0 self-center flex" x-data="{ open: false }"
                                    @click.outside="open = false" @close.stop="open = false">
                                    <div class="relative inline-block text-left">
                                        <div>
                                            <button @click="open = ! open" type="button"
                                                class="-m-2 p-2 rounded-full flex items-center text-white hover:text-gray-600"
                                                id="options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                                                <span class="sr-only">Open options</span>
                                                <!-- Heroicon name: solid/dots-vertical -->
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                                </svg>
                                            </button>
                                        </div>

                                        <div x-show="open" style="display: none;" @click="open = false"
                                            class="z-50 origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-concgreen-500 ring-1 ring-black ring-opacity-5 focus:outline-none"
                                            role="menu" aria-orientation="vertical"
                                            aria-labelledby="options-menu-0-button" tabindex="-1">
                                            <div role="none">
                                                <!-- Active: "bg-gray-100 text-white", Not Active: "text-white" -->
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                    class="cursor-point">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        type="submit"class=" text-white flex px-4 py-2 text-sm space-x-3 flex  items-center"
                                                        role="menuitem" tabindex="-1" id="options-menu-0-item-0">
                                                        <!-- Heroicon name: solid/star -->

                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-6 h-6 text-white">

                                                            <path fill-rule="evenodd"
                                                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                                clip-rule="evenodd" />
                                                        </svg>


                                                        <span>Supprimer</span>
                                                    </button>
                                                </form>

                                            </div>
                                            <div class="py-1" role="none">

                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="cursor-pointer w-full  text-white flex px-4 py-2 text-sm space-x-3 items-center"
                                                    role="menuitem" tabindex="-1" id="options-menu-0-item-0">


                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="currentColor" class="w-6 h-6 text-white">

                                                        <path
                                                            d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                                    </svg>



                                                    <span>Editer</span>
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 1 1 5l4 4" />
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
                                    class="w-full h-96 object-cover rounded-lg" alt="...">
                            </div>


                        @endif



                        <h2 id="question-title-81614" class="mt-4 text-base font-medium text-white">
                            {{ $post->title }}


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
                            @if ($post->user_id !== Auth::user()->id)
                                <span class="inline-flex items-center text-sm">
                                    @if ($post->liked())
                                        <form action="{{ route('unlike.post', $post->id) }}" method="post">
                                            @csrf

                                            <button type="submit"
                                                class="inline-flex justify-end items-end space-x-2 text-red-600 hover:text-gray-500">
                                                <!-- Heroicon name: solid/thumb-up -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-6 h-6">
                                                    <path
                                                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                                </svg>

                                                <span class="font-medium text-red-600">{{ $post->likeCount }}</span>
                                                <span class="sr-only">likes</span>
                                            </button>

                                        </form>
                                    @else
                                        <form action="{{ route('like.post', $post->id) }}" method="post">
                                            @csrf

                                            <button type="submit"
                                                class="inline-flex justify-end items-end space-x-2 text-white hover:text-gray-500">
                                                <!-- Heroicon name: solid/thumb-up -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="h-6 w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                                </svg>

                                                <span class="font-medium text-red-600">{{ $post->likeCount }}</span>
                                                <span class="sr-only">likes</span>
                                            </button>

                                        </form>
                                    @endif
                                </span>
                            @else
                                <span type="submit"
                                    class="inline-flex justify-end items-end space-x-2 text-red-600 hover:text-gray-500">
                                    <!-- Heroicon name: solid/thumb-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path
                                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                    </svg>

                                    <span class="font-medium text-red-600">{{ $post->likeCount }}</span>
                                    <span class="sr-only">likes</span>
                                </span>
                            @endif


                        </div>
                    </div>
                </article>
            </li>
        </ul>
    </div>
</main>
