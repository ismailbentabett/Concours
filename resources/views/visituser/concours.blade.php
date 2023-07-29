@extends('visituser.index')

@section('content')

    <div class="flex h-full">
        <!-- Content area -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <!-- Main content -->
            <div class="grid grid-cols-5">
                <main class="flex-1 overflow-y-auto col-span-4 lg:col-span-3">
                    <div class="mx-auto max-w-7xl px-4 pt-8 sm:px-6 lg:px-8">
                        <div class="flex">
                            <h1 class="flex-1 text-2xl font-bold text-white">Concours</h1>
                        </div>

                        <!-- Tabs -->
                        <h2 id="filter-heading" class="sr-only">Filters</h2>

                        <form action="{{ route('visituser.concours', ['id' => $user->id]) }}" method="GET">
                            <div class="mt-3 sm:mt-2">
                                <div class="2xl:hidden">
                                    <label for="tabs" class="sr-only">Select a tab</label>
                                    <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                                    <select id="tabs" name="tabs"
                                        class="text-white bg-concgreen-600 block w-full rounded-md border-gray-600 py-2 pl-3 pr-10 text-base focus:border-bittersweet-500 focus:outline-none focus:ring-bittersweet-500 sm:text-sm"
                                        onchange="this.form.submit()">
                                        <option value="all" {{ Request::input('tabs') == 'all' ? 'selected' : '' }}>All
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->name }}"
                                                {{ Request::input('tabs') == $category->name ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="hidden 2xl:block">
                                    <div class="flex items-center border-b border-gray-600">
                                        <nav class="-mb-px flex flex-wrap flex-1 space-x-4 xl:space-x-4 text-white"
                                            aria-label="Tabs">
                                            <a href="{{ route('visituser.concours', ['id' => $user->id, 'tabs' => 'all']) }}"
                                                aria-current="page"
                                                class="whitespace-nowrap px-1 py-4 text-sm font-medium hover:border-gray-600 hover:text-gray-700
                                                    {{ Request::input('tabs') == 'all' && Route::currentRouteName() === 'visituser.concours' ? 'border-b-2 border-bittersweet-500 text-bittersweet-600' : '' }}">
                                                All
                                            </a>
                                            @foreach ($categories as $category)
                                                <a href="{{ route('visituser.concours', ['id' => $user->id, 'tabs' => $category->name]) }}"
                                                    class="whitespace-nowrap px-1 py-4 text-sm font-medium hover:border-gray-600 hover:text-gray-700
                                                        {{ Request::input('tabs') == $category->name ? 'border-b-2 border-bittersweet-500 text-bittersweet-600' : '' }}">
                                                    {{ $category->name }}
                                                </a>
                                            @endforeach
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </form>



                        <!-- Gallery -->
                        <section class="mt-8 pb-16" aria-labelledby="gallery-heading">
                            <h2 id="gallery-heading" class="sr-only">Recently viewed</h2>
                            <ul role="list"
                                class="grid  gap-x-4 gap-y-8  sm:gap-x-6 grid-cols-1  lg:grid-cols-2 xl:grid-cols-2 xl:gap-x-8">
                                @if (count($concours) > 0)
                                    @foreach ($concours as $concour)
                                        <li class="relative">
                                            <!-- Current: "ring-2 ring-offset-2 ring-bittersweet-500", Default: "focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-bittersweet-500" -->



                                            <div
                                                class=" block w-full overflow-hidden rounded-lg bg-gray-100 ring-2 ring-bittersweet-500 ring-offset-2">
                                                <a class="block w-full h-full"
                                                    href="{{ request()->fullUrlWithQuery(['concourId' => $concour->id]) }}">
                                                    <img id="image-{{ $concour->id }}"
                                                        src="{{ asset('storage/' . $concour->image) }}" alt=""
                                                        alt=""
                                                        class=" object-cover pointer-events-non pointer-events-none group-hover:opacity-75">

                                                    <button type="button" class="absolute inset-0 focus:outline-none">
                                                        <span class="sr-only">View details for {{ $concour->profession }}
                                                            {{ $concour->id }}</span>
                                                    </button>
                                                </a>
                                            </div>



                                            <div class="flex justify-between">

                                                <p
                                                    class=" pointer-events-none mt-2 block truncate text-sm font-medium text-white">

                                                    {{ $concour->profession }}
                                                </p>

                                            </div>



                                            <p class="text-sm text-white">
                                                <a href="#" class="hover:underline">
                                                    <time>{{ $concour->created_at->format('Y-m-d') }}</time>

                                                </a>
                                            </p>
                                        </li>
                                    @endforeach
                                @else
                                    <a type="button"
                                        class="
                                    col-span-12
                                    relative block w-full border-2 border-gray-300 border-dashed rounded-lg p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
                                        </svg>
                                        <span class="mt-2 block text-sm font-medium text-white">
                                            Aucun article Trouvé
                                        </span>
                                    </a>
                                @endif

                                <!-- More files... -->
                            </ul>
                        </section>
                    </div>
                </main>

                <!-- Details sidebar -->
                <div class="col-span-4 lg:col-span-2">
                    @if (request()->has('concourId'))
                        <x-concour :concour="$data" />
                    @endif
                </div>



            </div>
        </div>
    </div>
@endsection
