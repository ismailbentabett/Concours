<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Concours') }}
        </h2>
    </x-slot>
    @auth
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-bg-concgreen-500 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">


                        <div class="space-y-6">
                            <div class="bg-bg-concgreen-500 shadow px-4 py-5 sm:rounded-lg sm:p-6">
                                <div class="md:grid md:grid-cols-3 md:gap-6">
                                    <div class="md:col-span-1">
                                        <h3 class="text-lg font-medium leading-6 text-white">Inscription au concours</h3>
                                        <p class="mt-1 text-sm text-slate-400">
                                            Concours Fashion Book Paris.
                                        </p>
                                    </div>
                                    <div class="mt-5 md:mt-0 md:col-span-2">

                                        <form class="relative" action="{{ route('concour.submit') }}" method="POST"
                                            enctype="multipart/form-data">

                                            @csrf


                                            <div>
                                                <label for="location"
                                                    class="block text-sm font-medium bg-concgreen-6000">Vous
                                                    etes
                                                    ?</label>
                                                <select id="profession" name="profession"
                                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-bittersweet-500 focus:border-bittersweet-500 sm:text-sm rounded-md bg-concgreen-500">
                                                    <option>Professionnel</option>
                                                    <option selected>Passionné</option>
                                                    <option>Autre</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="location"
                                                    class="block text-sm font-medium bg-concgreen-6000">Catégorie</label>
                                                <select id="category_id" name="category_id"
                                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-bittersweet-500 focus:border-bittersweet-500 sm:text-sm rounded-md bg-concgreen-500">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div>
                                                <label class="block text-sm font-medium bg-concgreen-6000">
                                                    Photo de couverture </label>
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
                                                                class="relative cursor-pointer bg-concgreen-500 rounded-md font-medium text-white hover:text-bittersweet-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-bittersweet-500">
                                                                <span>Télécharger un fichier</span>
                                                                <input id="image" name="image" type="file"
                                                                    class="sr-only">
                                                            </label>
                                                            <p class="pl-1">ou par glisser-déposer</p>
                                                        </div>
                                                        <p class="text-xs text-gray-500">
                                                            PNG, JPG, GIF jusqu'à 10MB
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-end">

                                                <button type="submit"
                                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-bg-concgreen-500 bg-bittersweet-600 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500">
                                                    Sauvegarder
                                                </button>
                                            </div>
                                            @if ($errors->any())
                                                <div class="rounded-md bg-red-50  p-4 opacity-80">
                                                    <div class="flex">
                                                        <div class="flex-shrink-0">
                                                            <!-- Heroicon name: solid/x-circle -->
                                                            <svg class="h-5 w-5 text-red-400"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <div class="ml-3">
                                                            <h3 class="text-sm font-medium text-red-800">
                                                                Il y a eu {{ $errors->count() }} erreurs dans votre
                                                                article
                                                            </h3>
                                                            <div class="mt-2 text-sm text-red-700">
                                                                <ul role="list" class="list-disc pl-5 space-y-1">


                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </div>




                    </div>
                </div>
            </div>
        </div>

    @endauth

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-bg-concgreen-600 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-100">
                    <div class="bg-concgreen-600">
                        <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
                            <div class="space-y-12">
                                <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                                        Association Concours de Mode</h2>
                                    <p class="text-xl text-white">Cette association a pour objet la valorisation et la
                                        représentation de l'artisanat des métiers d'arts par
                                        le biais
                                        de concours, défilés, présentations et expositions de mode.
                                        L'association souhaite mettre en avant la mode : Prêt-à-porter ; accessoires, et
                                        Haute Couture pour
                                        les
                                        catégories Hommes-Femmes-Enfants. Le but de l'association est de transmettre ce
                                        patrimoine
                                        immatériel
                                        français qu'est la couture (techniques spécifiques de couture, broderie etc...).
                                        En outre l'association
                                        souhaite faire émerger de nouveaux talents et faire découvrir les techniques de
                                        création
                                        traditionnelles
                                        (artisanat
                                        local, matières utilisées etc.) de tous les pays du monde.
                                        Enfin, l'association se veut intergénérationnelle en ce qu'elle souhaite
                                        préserver et transmettre un
                                        savoir-faire artisanal.</p>
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
            <div class="bg-bg-concgreen-600 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-100">
                    <div class="bg-concgreen-600">
                        <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
                            <div class="space-y-12">
                                <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                                        Catégories</h2>

                                </div>

                                <div class="bg-concgreen-600">
                                    <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
                                        <div class="space-y-12 lg:grid lg:grid-cols-3 lg:gap-8 lg:space-y-0">

                                            <div class="lg:col-span-2">
                                                <ul role="list"
                                                    class="space-y-12  sm:space-y-0 sm:-mt-8 lg:gap-x-8 lg:space-y-0">
                                                    @foreach ($unfilteredcategories as $category)
                                                        <li class="sm:py-8">
                                                            <div
                                                                class="space-y-4 sm:grid sm:grid-cols-4 sm:items-start sm:gap-6 sm:space-y-0">

                                                                <div
                                                                    class="aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4 sm:col-span-2">
                                                                    <img class="object-cover shadow-lg rounded-lg"
                                                                        src="{{ asset('storage/' . $category->image) }}"
                                                                        alt="1" alt="1" alt="">
                                                                    <div
                                                                        class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-red-700 bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-30">
                                                                    </div>
                                                                </div>
                                                                <div class="sm:col-span-2">
                                                                    <div class="space-y-4">
                                                                        <div
                                                                            class="text-5xl leading-6 font-medium space-y-1">
                                                                            <h3 class="">{{ $category->name }}
                                                                            </h3>
                                                                        </div>
                                                                        <div class="text-lg">
                                                                            <p class="text-white">
                                                                                {{ $category->description }}
                                                                            </p>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- top users --}}

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-bg-concgreen-600 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-800 dark:text-gray-100">
                        <div class="bg-concgreen-600">
                            <div class="max-w-7xl mx-auto py-12 px-4  sm:px-6 lg:px-8 lg:py-24">
                                <div class="space-y-12">
                                    <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl">
                                        <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                                            Les Profiles</h2>
                                        <p class="text-xl text-slate-400">Ornare sagittis, suspendisse in hendrerit
                                            quis.
                                            Sed dui aliquet lectus sit pretium egestas vel mattis neque.</p>
                                    </div>
                                    <ul role="list"
                                        class="mx-auto space-y-16 sm:grid sm:grid-cols-2 sm:gap-16 sm:space-y-0 lg:grid-cols-3 lg:max-w-5xl">
                                        @foreach ($users as $user)
                                            <li>
                                                <a href="{{ route('visituser.concours', ['id' => $user->id]) }}"
                                                    class="space-y-6">
                                                    @if ($user->avatar)
                                                        <img src="{{ asset('storage/' . $user->avatar) }}"
                                                            class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
                                                            alt="" />
                                                    @else
                                                        <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
                                                            src="{{ URL('image/profileplaceholder.jpg') }}"
                                                            alt="1" alt="" />
                                                    @endif
                                                    <div class="space-y-2">
                                                        <div
                                                            class="text-lg leading-6 font-medium space-y-1 text-center">
                                                            <h3 class="text-white">{{ $user->name }}</h3>
                                                            <p class="text-white">{{ $user->email }}</p>
                                                        </div>

                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-12">

                {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <div
                        class="bg-bg-concgreen-500 dark:bg-concgreen-600 overflow-hidden shadow-sm sm:rounded-lg flex-col justify-center items-center ">
                        <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl  mt-5">
                            <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl text-white">
                               Les Etapes</h2>
                            <p class="text-xl text-slate-400">Ornare sagittis, suspendisse in hendrerit
                                quis.
                                Sed dui aliquet lectus sit pretium egestas vel mattis neque.</p>
                        </div>

                        <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center items-center">
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
                                                    <span class="h-2.5 w-2.5 bg-concgreen-600 rounded-full"></span>

                                                </span>
                                            </span>
                                            <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 mt-5"
                                                src="{{ URL('image/etapes/1.jpg') }}" alt="">
                                            <span class="ml-4 min-w-0 flex flex-col">
                                                <span class="text-lg font-bold tracking-wide uppercase">Etap
                                                    1</span>
                                                <span class="text-sm text-text">Vitae sed mi luctus laoreet.</span>
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
                                                <spanF
                                                    class="relative z-10 w-8 h-8 flex items-center justify-center bg-bittersweet-600 rounded-full group-hover:bg-bittersweet-800">
                                                    <span class="h-2.5 w-2.5 bg-concgreen-600 rounded-full"></span>

                                                </span>
                                            </span>
                                            <span class="ml-4 min-w-0 flex flex-col">
                                                <span class="text-lg font-semibold tracking-wide uppercase">Etap
                                                    2</span>
                                                <span class="text-sm text-white">Cursus semper viverra facilisis et
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
                                                    <span class="h-2.5 w-2.5 bg-concgreen-600 rounded-full"></span>

                                                </span>

                                            </span>
                                            <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 mt-5"
                                                src="{{ URL('image/etapes/3.jpg') }}" alt="">
                                            <span class="ml-4 min-w-0 flex flex-col">
                                                <span class="text-lg font-semibold tracking-wide uppercase">Etap
                                                    3</span>
                                                <span class="text-sm text-white">Penatibus eu quis ante.</span>
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
                                                    <span class="h-2.5 w-2.5 bg-concgreen-600 rounded-full"></span>

                                                </span>
                                            </span>
                                            <span class="ml-4 min-w-0 flex flex-col">
                                                <span class="text-lg font-semibold tracking-wide uppercase">Etap
                                                    4</span>
                                                <span class="text-sm text-white">Penatibus eu quis ante.</span>
                                            </span>
                                        </a>
                                        <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 mt-5"
                                            src="{{ URL('image/etapes/4.jpg') }}" alt="">
                                    </li>



                                </ol>
                            </nav>

                        </div>
                    </div>
                </div> --}}
</x-app-layout>
