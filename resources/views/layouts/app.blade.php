<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Concours') }}</title>

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
    <div class="min-h-screen bg-gray-100 dark:bg-concgreen-500">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="">
            <div class="max-w-7xl mx-auto py-7 px-4 sm:px-6 lg:px-8">
            </div>
        </header>
        @if (isset($header))
            <header class="bg-white dark:bg-concgreen-600 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <x-footer />
    </div>

    <x-fab />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>


</body>

</html>
