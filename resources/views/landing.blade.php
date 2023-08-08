<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Concours de Mode') }}</title>

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
    <main>

        <div class="bg-concgreen-500">
            <div class="relative overflow-hidden">

                <main>

                    <div class="h-screen  bg-transparent  lg:overflow-hidden bg-fixed bg-cover bg-center flex flex-col justify-between "
                        style="background-image:linear-gradient(0deg, rgba(250,114,105, 0.2), rgba(250,114,105,0.2)),url({{ URL('image/header-bg.jpg') }})">
                        @include('layouts.navigation')
                        <div class="mx-auto max-w-7xl lg:px-8 mt-20">
                            <div class="">
                                <div class=" sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                                    <div class="lg:py-2">
                                        <h1
                                            class="mt-12 text-xl tracking-tight font-extrabold text-white sm:mt-8 sm:text-6xl lg:mt-1 xl:text-6xl">
                                            <span class="block mb-20"> Foire Internationale de Marseille 2023
                                            </span>
                                        </h1>

                                        @guest
                                            <a href="{{ 'login' }}"
                                                class="inline-flex items-center text-white bg-black rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200">
                                                <span
                                                    class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-gradient-to-r from-bittersweet-500 to-bittersweet-600 rounded-full">
                                                    Nous sommes Candidat ?
                                                </span>
                                                <span class="ml-4 text-sm">Connexion</span>
                                                <!-- Heroicon name: solid/chevron-right -->
                                                <svg class="ml-2 w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        @endguest
                                        <h1
                                            class="mt-4 text-xl tracking-tight font-extrabold text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                                            <span class="block mb-5"> Défilé De Mode

                                            </span>

                                            <span
                                                class="italic underline decoration-pink-700 decoration-wavy bg-gradient-to-r from-bittersweet-900 text-white">
                                                le 26 Septembre 2023 <br>

                                            </span>
                                        </h1>

                                        <p class="mt-4 text-2xl bg-gradient-to-r from-bittersweet-900 text-white "> Pour
                                            fêter cet événement qui réunira des créateurs et des passionnés de mode
                                            venez
                                            participer au défilé de mode qui aura lieu devant le palais des congrès du
                                            Parc
                                            Chanot! <a class="text-blue-600 visited:text-purple-300"
                                                href="https://www.foiredemarseille.com/"> Foire Internationale de
                                                Marseille</a><span
                                                class="font-bold underline decoration-pink-700 decoration-wavy"> De 14h
                                                à
                                                19h en l'honneur des femmes
                                            </span>
                                            <span class="block my-4 underline underline-offset-5 text-xl"> Les médias
                                                seront aussi présent pour cet occasion</span>
                                            Inscription <span
                                                class="font-bold underline decoration-pink-700 decoration-wavy"> OFFERT
                                            </span> auprès de l' association
                                            Concours de Mode
                                        </p>
                                        @guest
                                            <div class="mt-10 sm:mt-12">
                                                <form action="#" class="sm:max-w-xl sm:mx-auto lg:mx-0">
                                                    <div class="sm:flex">
                                                        <div class="min-w-0 flex-1">
                                                            <label for="email" class="sr-only">Saisissez votre adresse
                                                                électronique</label>
                                                            <input id="email" type="email"
                                                                placeholder="Saisissez votre adresse électronique"
                                                                class="block w-full px-4 py-3 rounded-md border-0 text-base text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-400 focus:ring-offset-gray-900">
                                                        </div>

                                                        <div class="mt-3 sm:mt-0 sm:ml-3">
                                                            <a href="{{ url('register') }}"
                                                                class="block w-full py-3 px-4 rounded-md 1 bg-gradient-to-r from-bittersweet-500 to-bittersweet-600 text-white font-medium hover:from-bittersweet-600 hover:to-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-400 focus:ring-offset-gray-900">Inscription</a>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        @endguest





                                    </div>
                                </div>

                            </div>
                        </div>


                        {{--      <div class="space-y-8 xl:col-span-1 w-full flex justify-center ">

                            <div class="flex space-x-6">
                                <a href="#" class="text-white hover:text-white">
                                    <span class="sr-only">Facebook</span>
                                    <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="#" class="text-white hover:text-white">
                                    <span class="sr-only">Instagram</span>
                                    <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="#" class="text-white hover:text-white">
                                    <span class="sr-only">Twitter</span>
                                    <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path
                                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                </a>


                            </div>
                        </div> --}}
                    </div>

                    <div class="pt-10 bg-transparent sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden bg-fixed bg-cover bg-center bg-gradient-to-r from-red-500 to-red-500 bg-red-200"
                        style="background-image:linear-gradient(0deg, rgba(250,114,105, 0.4), rgba(250,114,105,0.4)),url({{ URL('image/time_left.jpg') }})">
                        >
                        <div class="max-w-7xl mx-auto py-12 px-4 sm:py-16 sm:px-6 lg:px-8 lg:py-20">
                            <div class="max-w-4xl mx-auto text-center">
                                <h2 id="headline" class="text-3xl font-extrabold text-white sm:text-4xl">
                                    Défilé
                                </h2>

                            </div>
                            <dl id="countdown"
                                class="mt-10 text-center sm:max-w-3xl sm:mx-auto sm:grid sm:grid-cols-4 sm:gap-8">
                                <div class="flex flex-col">
                                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-bittersweet-200">
                                        Days
                                    </dt>
                                    <dd id="days" class="order-1 text-5xl font-extrabold text-white">

                                    </dd>
                                </div>
                                <div class="flex flex-col mt-10 sm:mt-0">
                                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-bittersweet-200">
                                        HOURS
                                    </dt>
                                    <dd id="hours" class="order-1 text-5xl font-extrabold text-white">

                                    </dd>
                                </div>
                                <div class="flex flex-col mt-10 sm:mt-0">
                                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-bittersweet-200">
                                        MINUTES
                                    </dt>
                                    <dd id="minutes" class="order-1 text-5xl font-extrabold text-white">

                                    </dd>
                                </div>
                                <div class="flex flex-col mt-10 sm:mt-0">
                                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-bittersweet-200">
                                        SECONDS
                                    </dt>
                                    <dd id="seconds" class="order-1 text-5xl font-extrabold text-white">

                                    </dd>
                                </div>
                            </dl>
                            @guest
                                <div class="flex justify-center items-center mt-5">
                                    <a href="{{ url('register') }}"
                                        class="block w-full py-3 px-7 text-center bg-white border border-transparent rounded-md 1 text-base font-medium text-bittersweet-700 hover:bg-gray-50 sm:inline-block sm:w-auto">Inscription</a>
                                </div>
                            @endguest

                        </div>
                    </div>








                    <!-- Feature section with screenshot -->
                    <div class="relative mt-10">

                        <div class="relative   bg-concgreen-500">
                            <div class="hidden absolute top-0 inset-x-0 h-1/2 bg-concgreen-500 lg:block"
                                aria-hidden="true">
                            </div>
                            <div class=" mx-auto  lg:bg-transparent lg:px-8">
                                <div class="lg:grid lg:grid-cols-12">
                                    <div
                                        class="relative z-10 lg:col-start-1 lg:row-start-1 lg:col-span-4 lg:py-16 lg:bg-transparent">

                                        <div class="max-w-md mx-auto px-4 sm:max-w-3xl sm:px-6 lg:max-w-none lg:p-0">
                                            <div
                                                class="aspect-w-10 aspect-h-6 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1">
                                                <img class="object-cover object-center rounded-3xl 1-2xl"
                                                    src="{{ URL('image/Le_concours.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="relative bg-concgreen-600 lg:col-start-3 lg:row-start-1 lg:col-span-10 lg:rounded-3xl lg:grid lg:grid-cols-10 lg:items-center"
                                        style="background-image:linear-gradient(0deg, rgba(250,114,105, 0.2), rgba(250,114,105,0.2)),url({{ URL('image/header-bg.jpg') }}); background-attachment: fixed; background-size: cover;">
                                        <div class="hidden absolute inset-0 overflow-hidden rounded-3xl lg:block"
                                            aria-hidden="true">
                                            <svg class="absolute bottom-full left-full transform translate-y-1/3 -translate-x-2/3 xl:bottom-auto xl:top-0 xl:translate-y-0"
                                                width="404" height="384" fill="none" viewBox="0 0 404 384"
                                                aria-hidden="true">
                                                <defs>
                                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0"
                                                        y="0" width="20" height="20"
                                                        patternUnits="userSpaceOnUse">
                                                        <rect x="0" y="0" width="4"
                                                            height="4" class="text-white" fill="currentColor" />
                                                    </pattern>
                                                </defs>
                                                <rect width="404" height="384"
                                                    fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
                                            </svg>
                                            <svg class="absolute top-full transform -translate-y-1/3 -translate-x-1/3 xl:-translate-y-1/2"
                                                width="404" height="384" fill="none" viewBox="0 0 404 384"
                                                aria-hidden="true">
                                                <defs>
                                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0"
                                                        y="0" width="20" height="20"
                                                        patternUnits="userSpaceOnUse">
                                                        <rect x="0" y="0" width="4"
                                                            height="4" class="text-white" fill="currentColor" />
                                                    </pattern>
                                                </defs>
                                                <rect width="404" height="384"
                                                    fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
                                            </svg>
                                        </div>

                                        <div
                                            class="relative max-w-md mx-auto py-12 px-4 space-y-6 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-none lg:p-0 lg:col-start-3 lg:col-span-6">
                                            <h2 class="text-2xl sm:text-8xl font-extrabold text-white uppercase"
                                                id="join-heading"> Exposition</h2>
                                            <p class="text-xl text-white">Durant 15 jours nous vous proposons d'exposer
                                                vos modèles au sein du Palais des Arts à la salle Gyptis durant <a
                                                    class="text-blue-600 visited:text-purple-600"
                                                    href="https://www.foiredemarseille.com/">la Foire
                                                    Internationale de Marseille </a> du <span
                                                    class="font-bold text-2xl">22
                                                    septembre au 2 octobre 2023</span>

                                                <br>Cet évènement est organisée avec la FoireInternationale de Marseille
                                                et <br> l 'Association Concours de Mode.
                                                <span class="block my-2 underline underline-offset-5 text-xl"> Soyez
                                                    visible et exposer vos plus belles créations ! </span>
                                                La participation est libre.
                                            </p>
                                            @guest
                                                <a class="block w-full py-3 px-5 text-center bg-white border border-transparent rounded-md 1 text-base font-medium text-bittersweet-700 hover:bg-gray-50 sm:inline-block sm:w-auto"
                                                    href="{{ url('register') }}">Inscription</a>
                                            @endguest
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    {{--  <div class="bg-concgreen-600 mt-10">
                        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                            <div class="grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
                                <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                                    <img class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg"
                                        alt="Tuple">
                                </div>
                                <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                                    <img class="h-12"
                                        src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg"
                                        alt="Mirage">
                                </div>
                                <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                                    <img class="h-12"
                                        src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg"
                                        alt="StaticKit">
                                </div>
                                <div class="col-span-1 flex justify-center md:col-span-3 lg:col-span-1">
                                    <img class="h-12"
                                        src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg"
                                        alt="Transistor">
                                </div>
                                <div class="col-span-2 flex justify-center md:col-span-3 lg:col-span-1">
                                    <img class="h-12"
                                        src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg"
                                        alt="Workcation">
                                </div>
                            </div>
                        </div>
                    </div> --}}



                    <!-- carousel -->

                    <div class="flex justify-center items-center bg-concgreen-600 my-10">
                        <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
                            <div class="w-full relative flex items-center justify-center">
                                <button aria-label="slide backward"
                                    class="backward absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer"
                                    id="prev">
                                    <svg class="dark:text-white w-7 h-7" width="8" height="14"
                                        viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <div class="owl-carousel owl-theme mt-5">

                                    <div class="item">
                                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                                            <img src="{{ URL('image/carousel/1.jpg') }}" alt="1"
                                                class="object-cover object-center w-full sm:w-96" />
                                            <div class="bg-concgreen-600 bg-opacity-30 absolute w-full h-full p-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                                            <img src="{{ URL('image/carousel/2.jpg') }}" alt="1"
                                                class="object-cover object-center w-full sm:w-96" />
                                            <div class="bg-concgreen-600 bg-opacity-30 absolute w-full h-full p-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                                            <img src="{{ URL('image/carousel/3.jpg') }}" alt="1"
                                                class="object-cover object-center w-full sm:w-96" />
                                            <div class="bg-concgreen-600 bg-opacity-30 absolute w-full h-full p-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                                            <img src="{{ URL('image/carousel/4.jpg') }}" alt="1"
                                                class="object-cover object-center w-full sm:w-96" />
                                            <div class="bg-concgreen-600 bg-opacity-30 absolute w-full h-full p-6">
                                            </div>
                                        </div>
                                    </div>




                                </div>

                                <button aria-label="slide forward"
                                    class="forward absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400"
                                    id="next">
                                    <svg class="dark:text-white w-7 h-7" width="8" height="14"
                                        viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>


                    {{-- categories --}}
                    <div class="bg-concgreen-500 bg-fixed bg-cover bg-center flex flex-col justify-between "
                        style="background-image:linear-gradient(0deg, rgba(250,114,105, 0.2), rgba(250,114,105,0.2)),url({{ URL('image/concours.jpg') }})">
                        <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
                            <div class="space-y-12">
                                <div class="space-y-5 sm:space-y-4 md:max-w-xl lg:max-w-3xl xl:max-w-none">
                                    <h2
                                        class="text-2xl sm:text-8xl font-extrabold tracking-tight sm:text-4xl text-white uppercase">
                                        Catégories</h2>
                                    {{-- <p class="text-xl text-white">Odio nisi, lectus dis nulla. Ultrices maecenas
                                        vitae rutrum dolor ultricies donec risus sodales. Tempus quis et.</p> --}}
                                </div>
                                <ul role="list"
                                    class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">

                                    @foreach ($categories as $category)
                                        <li>
                                            <div class="space-y-4" data-popover-target="{{ $category->name }}">
                                                <div class="aspect-w-3 aspect-h-2 hover:scale-125">
                                                    <a href={{ url('concours') }}>
                                                        <img class="object-cover 1-lg rounded-lg"
                                                            src="{{ asset('storage/' . $category->image) }}"
                                                            alt="1" alt="">
                                                    </a>

                                                </div>

                                                <div class="space-y-2">
                                                    <div class="text-lg leading-6 font-medium space-y-1">

                                                        <p class="text-white text-5xl hover:bg-pink-900">
                                                            {{ $category->name }}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>


                    {{-- top users --}}

                    <div class="bg-concgreen-500 bg-fixed bg-cover bg-center flex flex-col justify-between "
                        style="background-image:linear-gradient(0deg, rgba(250,114,105, 0.2), rgba(250,114,105,0.2)),url({{ URL('image/candidates.jpg') }})">

                        >
                        <div class="max-w-7xl mx-auto py-12 px-4  sm:px-6 lg:px-8 lg:py-24">
                            <div class="space-y-12">
                                <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl">
                                    <h2
                                        class="text-2xl sm:text-8xl font-extrabold tracking-tight sm:text-4xl text-white uppercase">
                                        Les Profiles </h2>

                                    <p class="text-xl text-white">Ornare sagittis, suspendisse in hendrerit quis.
                                        Sed dui aliquet lectus sit pretium egestas vel mattis neque.</p>
                                </div>
                                <ul role="list"
                                    class="mx-auto space-y-16 sm:grid sm:grid-cols-2 sm:gap-16 sm:space-y-0 lg:grid-cols-3 lg:max-w-5xl">
                                    @foreach ($topUsers as $user)
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
                                                    <div class="text-lg leading-6 font-medium space-y-1 text-center">
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
                    {{-- contact --}}

                    <div class="bg-concgreen-600">
                        <div class=" mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                            <div class="relative bg-concgreen-600500 1-xl">
                                {{-- <h2 class="sr-only">Contact us</h2> --}}
                                <h2
                                    class="text-2xl sm:text-8xl font-extrabold tracking-tight sm:text-4xl text-white uppercase">
                                    Contactez-nous</h2>

                                <div class="grid grid-cols-1 lg:grid-cols-3">

                                    <!-- Contact information -->
                                    <div class="relative overflow-hidden py-10 px-6 bg-black sm:px-10 xl:p-12"
                                        style="background-image:url({{ URL('image/map-image.png') }})">
                                        <div class="absolute inset-0 pointer-events-none sm:hidden"
                                            aria-hidden="true">
                                            <svg class="absolute inset-0 w-full h-full" width="343" height="388"
                                                viewBox="0 0 343 388" fill="none"
                                                preserveAspectRatio="xMidYMid slice"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z"
                                                    fill="url(#linear1)" fill-opacity=".1" />
                                                <defs>
                                                    <linearGradient id="linear1" x1="254.553" y1="107.554"
                                                        x2="961.66" y2="814.66" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#fff"></stop>
                                                        <stop offset="1" stop-color="#fff" stop-opacity="0">
                                                        </stop>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>

                                        {{-- <h3 class="text-lg font-medium text-white">Contact information</h3>
                                        <p class="mt-6 text-base text-bittersweet-50 max-w-3xl">Nullam risus blandit ac
                                            aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor
                                            lacus arcu.</p>
                                        <dl class="mt-8 space-y-6">
                                            <dt><span class="sr-only">Phone number</span></dt>
                                            <dd class="flex text-base text-bittersweet-50">
                                                <!-- Heroicon name: outline/phone -->
                                                <svg class="flex-shrink-0 w-6 h-6 text-bittersweet-200"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                                <span class="ml-3">+1 (555) 123-4567</span>
                                            </dd>
                                            <dt><span class="sr-only">Email</span></dt>
                                            <dd class="flex text-base text-bittersweet-50">
                                                <!-- Heroicon name: outline/mail -->
                                                <svg class="flex-shrink-0 w-6 h-6 text-bittersweet-200"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                <span class="ml-3">support@concours.com</span>
                                            </dd>
                                        </dl> --}}
                                        {{-- <ul role="list" class="mt-8 flex space-x-12">
                                            <li>
                                                <a class="text-bittersweet-200 hover:text-bittersweet-100"
                                                    href="#">
                                                    <span class="sr-only">Facebook</span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="w-6 h-6" aria-hidden="true">
                                                        <path
                                                            d="M22.258 1H2.242C1.556 1 1 1.556 1 2.242v20.016c0 .686.556 1.242 1.242 1.242h10.776v-8.713h-2.932V11.39h2.932V8.887c0-2.906 1.775-4.489 4.367-4.489 1.242 0 2.31.093 2.62.134v3.037l-1.797.001c-1.41 0-1.683.67-1.683 1.653v2.168h3.362l-.438 3.396h-2.924V23.5h5.733c.686 0 1.242-.556 1.242-1.242V2.242C23.5 1.556 22.944 1 22.258 1"
                                                            fill="currentColor" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-bittersweet-200 hover:text-bittersweet-100"
                                                    href="#">
                                                    <span class="sr-only">GitHub</span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="w-6 h-6" aria-hidden="true">
                                                        <path
                                                            d="M11.999 0C5.373 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.386.6.11.819-.26.819-.578 0-.284-.01-1.04-.017-2.04-3.337.724-4.042-1.61-4.042-1.61-.545-1.386-1.332-1.755-1.332-1.755-1.09-.744.082-.73.082-.73 1.205.086 1.838 1.238 1.838 1.238 1.07 1.833 2.81 1.304 3.493.996.109-.775.419-1.303.762-1.603C7.145 17 4.343 15.97 4.343 11.373c0-1.31.468-2.382 1.236-3.22-.124-.304-.536-1.524.118-3.176 0 0 1.007-.323 3.3 1.23.956-.266 1.983-.4 3.003-.404 1.02.005 2.046.138 3.005.404 2.29-1.553 3.296-1.23 3.296-1.23.655 1.652.243 2.872.12 3.176.77.838 1.233 1.91 1.233 3.22 0 4.61-2.806 5.624-5.478 5.921.43.37.814 1.103.814 2.223 0 1.603-.015 2.898-.015 3.291 0 .321.217.695.825.578C20.565 21.796 24 17.3 24 12c0-6.627-5.373-12-12.001-12"
                                                            fill="currentColor" />
                                                    </svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="text-bittersweet-200 hover:text-bittersweet-100">
                                                    <span class="sr-only">Twitter</span>
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="w-6 h-6" aria-hidden="true">
                                                        <path
                                                            d="M7.548 22.501c9.056 0 14.01-7.503 14.01-14.01 0-.213 0-.425-.015-.636A10.02 10.02 0 0024 5.305a9.828 9.828 0 01-2.828.776 4.94 4.94 0 002.165-2.724 9.867 9.867 0 01-3.127 1.195 4.929 4.929 0 00-8.391 4.491A13.98 13.98 0 011.67 3.9a4.928 4.928 0 001.525 6.573A4.887 4.887 0 01.96 9.855v.063a4.926 4.926 0 003.95 4.827 4.917 4.917 0 01-2.223.084 4.93 4.93 0 004.6 3.42A9.88 9.88 0 010 20.289a13.941 13.941 0 007.548 2.209"
                                                            fill="currentColor" />
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul> --}}
                                    </div>

                                    <!-- Contact form -->
                                    <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12">
                                        <h3 class="text-lg font-medium text-white">Envoyez-nous un message</h3>
                                        <form id="contactForm"
                                            class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8"
                                            action="{{ route('contact.store') }}" method="POST">

                                            @csrf

                                            <div>
                                                <x-input-label for="firstName" :value="__('Prénom')" />
                                                <x-text-input id="firstName" class="block mt-1 w-full" type="text"
                                                    name="firstName" :value="old('firstName')" autocomplete="firstName" />
                                                <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="lastName" :value="__('Nom')" />
                                                <x-text-input id="lastName" class="block mt-1 w-full" type="text"
                                                    name="lastName" :value="old('lastName')" autocomplete="lastName" />
                                                <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-input-label for="email" :value="__('Email')" />
                                                <x-text-input id="email" class="block mt-1 w-full" type="email"
                                                    name="email" :value="old('email')" autocomplete="email" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <div>
                                                <div>
                                                    <x-input-label for="phone" :value="__('Téléphone')" />
                                                    <x-text-input id="phone" class="block mt-1 w-full"
                                                        type="text" name="phone" :value="old('phone')"
                                                        autocomplete="phone" />
                                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <div>
                                                    <x-input-label for="subject" :value="__('Sujet')" />
                                                    <x-text-input id="subject" class="block mt-1 w-full"
                                                        type="text" name="subject" :value="old('subject')"
                                                        autocomplete="subject" />
                                                    <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <div class="flex justify-between">
                                                    <label for="message"
                                                        class="block text-sm font-medium text-white">Message</label>
                                                    <span id="message-max" class="text-sm text-white">Max. 500
                                                        caractères</span>
                                                </div>
                                                <div class="mt-1">
                                                    <textarea id="message" name="message" rows="4"
                                                        class="py-3 px-4 block w-full 1 text-black bg-white focus:ring-bittersweet-500 focus:border-bittersweet-500 border border-gray-300 rounded-md"
                                                        aria-describedby="message-max"></textarea>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2 sm:flex sm:justify-end">
                                                <button type="submit"
                                                    class="mt-2 w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md 1 text-base font-medium text-white bg-bittersweet-400 hover:bg-bittersweet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bittersweet-500 sm:w-auto">
                                                    Envoyer
                                                </button>
                                            </div>

                                            @if ($errors->any())
                                                <div
                                                    class="error-message sm:col-span-2 rounded-md bg-red-50  p-4 opacity-80">
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
                                                                Article
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

                </main>




                <x-footer />

            </div>
        </div>
    </main>
    </div>
    <x-fab />

    <style>

    </style>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
    <script>
        window.onscroll = () => {
            const nav = document.querySelector("#navbar");
            if (this.scrollY <= 10) nav.className =
                "fadeIn 2s ease-in forwards navbar bg-transparent fixed z-50 w-screen"
            else nav.className = "fadeIn 2s ease-in forwards bg-concgreen-700 navbar  fixed z-50 w-screen";
        };




        // jQuery(document).ready(function($) {
        //     $('.owl-carousel').owlCarousel({
        //         loop: true,
        //         margin: 10,
        //         nav: true,
        //         responsive: {
        //             0: {
        //                 items: 1
        //             },
        //             600: {
        //                 items: 3
        //             },
        //             1000: {
        //                 items: 5
        //             }
        //         }
        //     })
        // })



        const errors = document.querySelector('.error-message');
        if (errors) {
            // If there are, scroll to the first error message
            errors.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

        }
    </script>
</body>

</html>
