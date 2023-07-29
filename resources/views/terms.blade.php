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
                            RGPD</h1>
                        <p class="mt-6 text-xl text-white max-w-3xl">Une donnée personnelle est toute information se rapportant à une personne physique identifiée ou identifiable. Mais, parce qu’elles concernent des personnes, celles-ci doivent en conserver la maîtrise.

                            Une personne physique peut être identifiée :
                            
                            directement (exemple : nom et prénom) ;
                            indirectement (exemple : par un numéro de téléphone ou de plaque d’immatriculation, un identifiant tel que le numéro de sécurité sociale, une adresse postale ou courriel, mais aussi la voix ou l’image).
                            L’identification d’une personne physique peut être réalisée :
                            
                            à partir d’une seule donnée (exemple : nom) ;
                            à partir du croisement d’un ensemble de données (exemple : une femme vivant à telle adresse, née tel jour et membre dans telle association).
                            Par contre, des coordonnées d’entreprises (par exemple, l’entreprise « Compagnie A » avec son adresse postale, le numéro de téléphone de son standard et un courriel de contact générique) ne sont pas, en principe, des données personnelles.
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
                    <h2 id="offices-heading" class="text-5xl font-extrabold text-white">Réglement</h2>
                    <p class="mt-6 text-xl text-white max-w-3xl">Cette association a pour objet la valorisation et la représentation de l'artisanat des métiers d'arts par le biais de concours, défilés, présentations et expositions de mode. L'association souhaite mettre en avant la mode : Prêt-à-porter ; accessoires, et Haute Couture pour les catégories Hommes-Femmes-Enfants. Le but de l'association est de transmettre ce patrimoine immatériel français qu'est la couture (techniques spécifiques de couture, broderie etc...). En outre l'association souhaite faire émerger de nouveaux talents et faire découvrir les techniques de création traditionnelles (artisanat local, matières utilisées etc.) de tous les pays du monde. Enfin, l'association se veut intergénérationnelle en ce qu'elle souhaite préserver et transmettre un savoir-faire artisanal.</p>

                </div>
            </section>
            <section aria-labelledby="offices-heading">
                <div class="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                    <h2 id="offices-heading" class="text-5xl font-extrabold text-white">Mention Légale</h2>
                    <p class="mt-6 text-lg text-white max-w-3xl">Les mentions légales sont les informations qui permettent à l'internaute de vous identifier.

                        Les mentions légales sont obligatoires sur tout site internet professionnel et doivent être facilement accessibles.
                        
                        Elles peuvent être insérées dans vos conditions générales de vente (CGV) ou dans une page dédiée.
                        
                        Vous devez renseigner les informations suivantes :
                        
                        Identité de l'entreprise : dénomination sociale, forme juridique, adresse du siège social et montant du capital social.
                        Numéro d'immatriculation au RCS: RCS : Registre du commerce et des sociétés et/ou numéro Siren
                        Mail et numéro de téléphone pour contacter votre entreprise
                        Numéro d'identification à la TVA
                        Identité de l'hébergeur: Entreprise en charge de stocker sur ses serveurs les données du site internet du site : nom ou dénomination sociale, adresse et numéro de téléphone
                        Si vous exercez une activité réglementée et soumise à autorisation (pharmacie ou débit de boissons, par exemple) : nom et adresse de l'autorité qui a délivré l'autorisation</p>

                </div>
            </section>
        </main>

        <x-footer />
    </div>



</body>

</html>
