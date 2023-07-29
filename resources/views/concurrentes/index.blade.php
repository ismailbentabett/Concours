<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profiles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-concgreen-600 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div
                                class="bg-bg-concgreen-500 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <div class="bg-concgreen-600">
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
                                            class="relative z-10  grid items-center">
                                            <h2 id="filter-heading" class="sr-only">Filters</h2>
                                            <form action="{{ route('concurrentes.index') }}" method="GET">
                                                <div class="mt-3 sm:mt-2">
                                                    <div class="md:hidden">
                                                        <label for="tabs" class="sr-only">Select a tab</label>
                                                        <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                                                        <select id="tabs" name="tabs"
                                                            class="text-white bg-concgreen-600 block w-full rounded-md border-gray-600 py-2 pl-3 pr-10 text-base focus:border-bittersweet-500 focus:outline-none focus:ring-bittersweet-500 sm:text-sm"
                                                            onchange="this.form.submit()">
                                                            <option
                                                                value="all"{{ Request::input('tabs') == 'all' ? ' selected' : '' }}>
                                                                Tous</option>
                                                            @foreach ($categories as $category)
                                                                <option
                                                                    value="{{ $category->name }}"{{ Request::input('tabs') == $category->name ? ' selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="hidden md:block">
                                                        <div class="flex items-center border-b border-gray-600">
                                                            <nav class="-mb-px flex flex-wrap flex-1 space-x-6 xl:space-x-8 text-white "
                                                                aria-label="Tabs">
                                                                <a href="{{ route('concurrentes.index', ['tabs' => 'all']) }}"
                                                                    aria-current="page"
                                                                    class="whitespace-nowrap   px-1 py-4 text-sm font-medium hover:border-gray-600 hover:text-gray-700
                                                                    @if (Request::input('tabs') == 'all' && Route::currentRouteName() === 'concurrentes.index') border-b-2 border-bittersweet-500  text-bittersweet-600 @endif
                                                                    ">
                                                                    Tous
                                                                </a>

                                                                @foreach ($categories as $category)
                                                                    <a href="{{ route('concurrentes.index', ['tabs' => $category->name]) }}
                                                                    "
                                                                        class="whitespace-nowrap  px-1 py-4 text-sm font-medium  hover:border-gray-600 hover:text-gray-700
                                                                        @if (Request::input('tabs') == $category->name) border-b-2 border-bittersweet-500  text-bittersweet-600 @endif
                                                                        ">
                                                                        {{ $category->name }}
                                                                    </a>
                                                                @endforeach
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>




                                            <div class=" py-10" id="disclosure-1">
                                                <div class="bg-concgreen-500">
                                                    <div
                                                        class="max-w-7xl mx-auto py-12 px-4 text-center sm:px-6 lg:px-8 lg:py-24">
                                                        <div class="space-y-12">

                                                            <ul role="list"
                                                                class="mx-auto space-y-16 sm:grid sm:grid-cols-1 sm:gap-16 sm:space-y-0 lg:grid-cols-3 lg:max-w-5xl">
                                                                @if (count($concours) > 0)

                                                                    @foreach ($concours as $concour)
                                                                        <li>
                                                                            <div class="space-y-6">
                                                                                <a
                                                                                    href="{{ route('visituser.concours', ['id' => $concour->user->id]) }}">
                                                                                    @if ($concour->user->avatar)
                                                                                        <img src="{{ asset('storage/' . $concour->user->avatar) }}"
                                                                                            class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
                                                                                            alt="" />
                                                                                    @else
                                                                                        <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
                                                                                            src="{{ URL('image/profileplaceholder.jpg') }}"
                                                                                            alt="1"
                                                                                            alt="" />
                                                                                    @endif
                                                                                </a>
                                                                                <div class="space-y-2">
                                                                                    <div
                                                                                        class="text-lg leading-6 font-medium space-y-1">
                                                                                        <h3 class="text-white">
                                                                                            {{ $concour->user->name }}
                                                                                        </h3>
                                                                                        <p class="text-white">
                                                                                            {{ $concour->user->email }}
                                                                                        </p>
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
                                                                @else

                                                                    <a type="button"
                                                                        class="
                                                                        col-span-12
                                                                        relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">
                                                                        <svg class="mx-auto h-12 w-12 text-gray-400"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            stroke="currentColor" fill="none"
                                                                            viewBox="0 0 48 48" aria-hidden="true">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
                                                                        </svg>
                                                                        <span
                                                                            class="mt-2 block text-sm font-medium text-white">
                                                                            Aucun utilisateur dans cette catégorie
                                                                        </span>
                                                                    </a>
                                                                @endif


                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Pagination links -->
                                            <div class=" px-4 py-3  border-t border-gray-200 sm:px-6 mt-10">

                                                {{ $concours->links('pagination::tailwind') }}
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
