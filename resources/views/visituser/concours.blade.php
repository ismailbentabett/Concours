@extends('visituser.index')

@section('content')
    <div class="flex h-full">
        <!-- Content area -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <!-- Main content -->
            <div class="flex flex-1 items-stretch overflow-hidden">
                <main class="flex-1 overflow-y-auto">
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
                                            <a href="{{ route('visituser.concours',['id' => $user->id, 'tabs' => 'all']) }}" aria-current="page"
                                                class="whitespace-nowrap px-1 py-4 text-sm font-medium hover:border-gray-600 hover:text-gray-700
                                                    {{ Request::input('tabs') == 'all' ? 'border-b-2 border-bittersweet-500 text-bittersweet-600' : '' }}">
                                                All
                                            </a>
                                            @foreach ($categories as $category)
                                                <a href="{{ route('visituser.concours',['id' => $user->id, 'tabs' => $category->name]) }}"
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
                                class="grid  gap-x-4 gap-y-8  sm:gap-x-6 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                @if (count($concours) > 0)
                                    @foreach ($concours as $concour)
                                        <li class="relative">
                                            <!-- Current: "ring-2 ring-offset-2 ring-bittersweet-500", Default: "focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-bittersweet-500" -->



                                            <div
                                                class="aspect-w-10 aspect-h-6 group block w-full overflow-hidden rounded-lg bg-gray-100 ring-2 ring-bittersweet-500 ring-offset-2">
                                                <a class="block w-full h-full"
                                                    onclick="selectImage({{ $concour->id }}, '{{ $concour->profession }}' , '{{ $concour }}' , '{{$user}}' )">
                                                    <img id="image-{{ $concour->id }}"  src="{{ asset('storage/' . $concour->image) }}"
                                                        alt="" alt=""
                                                        class=" object-cover pointer-events-non pointer-events-none group-hover:opacity-75" >

                                                    <button type="button" class="absolute inset-0 focus:outline-none">
                                                        <span class="sr-only">View details for {{ $concour->profession }}
                                                            {{ $concour->id }}</span>
                                                    </button>
                                                </a>
                                            </div>

                                            <p
                                                class="pointer-events-none mt-2 block truncate text-sm font-medium text-white">

                                                {{ $concour->profession }}
                                            </p>
                                            <p class="text-sm text-white">
                                                <a href="#" class="hover:underline">
                                                    <time>{{ $concour->created_at->format('Y-m-d') }}</time>

                                                </a>
                                            </p>
                                        </li>
                                    @endforeach
                                @else
                                    <!-- This example requires Tailwind CSS v2.0+ -->
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
                                            No Submittion Found
                                        </span>
                                    </a>
                                @endif

                                <!-- More files... -->
                            </ul>
                        </section>
                    </div>
                </main>

                <!-- Details sidebar -->
                <aside id="sidebarimg" class="hidden w-96 overflow-y-auto border-l border-gray-600 bg-concgreen-600 p-8 ">
                    <div class="space-y-6 pb-16">
                        <div>
                            <div class="aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg">
                                <img id="thesidebarimg"
                                    src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
                                    alt="" class="object-cover" />
                            </div>
                            <div class="mt-4 flex items-start justify-between">
                                <div>
                                    <h2 id="sideimgname" class="text-lg font-medium text-white"><span class="sr-only">Details for
                                        </span></h2>
                                </div>
                                <button type="button"
                                    class="ml-4 flex h-8 w-8 items-center justify-center rounded-full bg-concgreen-600 text-gray-400 hover:bg-gray-100 hover:text-white focus:outline-none focus:ring-2 focus:ring-bittersweet-500">
                                    <!-- Heroicon name: outline/heart -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    <span class="sr-only">Favorite</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-medium text-white">Information</h3>
                            <dl class="mt-2 divide-y divide-gray-200 border-b border-t border-gray-600">
                                <div class="flex justify-between py-3 text-sm font-medium">
                                    <dt class="text-white">Uploaded by</dt>
                                    <dd id="username" class="text-white"></dd>
                                </div>

                                <div class="flex justify-between py-3 text-sm font-medium">
                                    <dt class="text-white">Created</dt>
                                    <dd id="createdat" class="text-white"></dd>

                                </div>

                                <div class="flex justify-between py-3 text-sm font-medium">
                                    <dt class="text-white">Last modified</dt>
                                    <dd id="updatedat" class="text-white"></dd>
                                </div>


                            </dl>
                        </div>
                        <div>
                            <h3 class="font-medium text-white">Description</h3>
                            <div class="mt-2 flex items-center justify-between">
                                <p class="text-sm italic text-white">Add a description to this image.</p>
                                <button type="button"
                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-concgreen-600 text-gray-400 hover:bg-gray-100 hover:text-white focus:outline-none focus:ring-2 focus:ring-bittersweet-500">
                                    <!-- Heroicon name: solid/pencil -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    <span class="sr-only">Add description</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-medium text-white">Shared with</h3>
                            <ul role="list" class="mt-2 divide-y divide-gray-200 border-b border-t border-gray-600">
                                <li class="flex items-center justify-between py-3">
                                    <div class="flex items-center">
                                        @if ($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}"
                                            class="h-8 w-8 rounded-full" alt="" />

                                        @else
                                            <img class="h-8 w-8 rounded-full"
                                             src="{{ URL('image/profileplaceholder.jpg') }}" alt="1"
                                                alt="" />
                                        @endif
                                        <p id="sharedwithusername" class="ml-4 text-sm font-medium text-white"></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection


<script>
    function formatDate(dateString) {
        const date = new Date(dateString);
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        return date.toLocaleDateString(undefined, options);
    }

    function selectImage(imageId, profession, concour , user) {
console.log(user)
        var createdat = document.getElementById('createdat');
        var updatedat = document.getElementById('updatedat');
        var username = document.getElementById('username');
        var sideimgname = document .getElementById('sideimgname');
        var sharedwithusername = document .getElementById('sharedwithusername');
        var parsedconcour = JSON.parse(concour);
        console.log(parsedconcour)
        parseduser = JSON.parse(user);
        createdat.innerHTML = formatDate(parsedconcour.created_at)
        updatedat.innerHTML = formatDate(parsedconcour.updated_at)
        username.innerHTML = parseduser.name
        sharedwithusername.innerHTML = parseduser.name
        sideimgname.innerHTML = parsedconcour.profession
        event.preventDefault();

        // Update the selected image source
        var selectedImage = document.getElementById(`image-${imageId}`);



        // Show the sidebar
        var sidebar = document.getElementById('sidebarimg');
        var thesidebarimg = document.getElementById('thesidebarimg');

        sidebar.style.display = 'block';

        thesidebarimg.src = selectedImage.src;
    }

    function deselectImage(event) {
        event.preventDefault();



        // Hide the sidebar

    }
</script>
