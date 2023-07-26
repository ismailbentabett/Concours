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
    @include('layouts.navigation')


    <div class="bg-concgreen-600">


        <main class="overflow-hidden">
            <!-- Header -->
            <div class="bg-warm-gray-50">
                <div class="py-24 lg:py-32">
                    <div class="relative z-10 max-w-7xl mx-auto pl-4 pr-8 sm:px-6 lg:px-8">
                        <h1 class="text-5xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
                            Termes Du Service</h1>
                        <p class="mt-6 text-xl text-white max-w-3xl">Vel nunc non ut montes, viverra tempor.
                            Proin lectus nibh phasellus morbi non morbi. In elementum urna ut volutpat. Sagittis et vel
                            et fermentum amet consequat Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero
                            nostrum deleniti minima magnam minus mollitia iure, rem, quos quod, voluptate vel
                            consequuntur facere reiciendis. Adipisci eligendi officiis molestiae aliquam amet
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident eos at inventore
                            voluptates debitis, distinctio enim fugit, reiciendis architecto saepe earum obcaecati
                            ratione, cum corrupti ipsa excepturi ea quaerat sapiente Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit. Quod illum ipsa illo excepturi numquam architecto, neque
                            necessitatibus sint sit est fugit recusandae vero tempora obcaecati dolorum. Eveniet nulla
                            nesciunt magni.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact section -->
            <section class="relative bg-white" aria-labelledby="contact-heading">
                <div class="absolute w-full h-1/2 bg-white" aria-hidden="true"></div>
                <!-- Decorative dot pattern -->
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <svg class="absolute z-0 top-0 right-0 transform -translate-y-16 translate-x-1/2 sm:translate-x-1/4 md:-translate-y-24 lg:-translate-y-72"
                        width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0"
                                width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-white"
                                    fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
                    </svg>
                </div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="relative bg-white shadow-xl">
                        <h2 id="contact-heading" class="sr-only">Contact us</h2>

                    </div>
                </div>
            </section>

            <!-- Contact grid -->
            <section aria-labelledby="offices-heading">
                <div class="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                    <h2 id="offices-heading" class="text-5xl font-extrabold text-white">Règles</h2>
                    <p class="mt-6 text-lg text-white max-w-3xl">Varius facilisi mauris sed sit. Non sed et duis
                        dui leo, vulputate id malesuada non. Cras aliquet purus dui laoreet diam sed lacus, fames Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Alias et at exercitationem dolore ad animi
                        dignissimos nostrum dolorem repellendus maxime ratione quia, dicta ipsa laudantium quis
                        voluptatibus dolorum sed enim Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Similique, corporis officia. Labore quibusdam placeat itaque saepe, maxime inventore laborum
                        quis aspernatur dolores dolore ad natus vitae, facere molestias odit beatae Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Reiciendis velit, fuga voluptatem nisi nihil corrupti
                        vero, id est deserunt, illum repudiandae ea totam aspernatur consectetur molestiae obcaecati
                        recusandae repellat assumenda Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste
                        quasi tempore alias deserunt architecto laborum voluptatem asperiores quia voluptatibus
                        consequatur, provident corporis nostrum a sunt impedit natus nemo sint? Exercitationem?</p>

                </div>
            </section>
        </main>

        <x-footer />
    </div>



</body>

</html>
