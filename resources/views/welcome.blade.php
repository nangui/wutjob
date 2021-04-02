<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header>
            <div class="max-w-7xl mx-auto py-12 px-8 sm:px-12 lg:px-16">
                <form method="POST" action="" class="w-full">
                    <div class="flex">
                        <div class="flex-1 relative">
                            <x-heroicon-o-search class="absolute top-3 left-1.5 w-6 h-6 text-gray-500" />
                            <input id="title"
                                class="rounded-l-md block border-0 mt-1 w-full focus:ring focus:ring-indigo-200 focus:ring-opacity-50 pl-8"
                                type="text" placeholder="Saisissez le titre" name="title" :value="old('title')" required
                                autofocus />
                        </div>
                        <div class="sm:w-1/5 relative">
                            <x-heroicon-o-credit-card class="absolute top-3 left-1.5 w-6 h-6 text-gray-500" />
                            <select id="salary" name="salary"
                                class="border-0 border-l focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full mt-1 pl-8">
                                <option class="text-gray-400">
                                    {{ __('Salaire min.') }}
                                </option>
                                <option value="150000">150.000 F CFA</option>
                                <option value="150000">250.000 F CFA</option>
                                <option value="150000">350.000 F CFA</option>
                                <option value="150000">450.000 F CFA</option>
                                <option value="150000">550.000 F CFA</option>
                            </select>
                        </div>
                        <div class="sm:w-1/5 relative">
                            <x-heroicon-o-briefcase class="absolute top-3 left-1.5 w-6 h-6 text-gray-500" />
                            <select id="work_type" name="work_type"
                                class="border-0 border-l focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full mt-1 pl-8">
                                <option>{{  __('Type travail') }}</option>
                                <option value="full_time">Temps Plein</option>
                                <option value="part_time">Temps partiel</option>
                                <option value="stage">Stage</option>
                            </select>
                        </div>
                        <div class="relative sm:w-1/5">
                            <x-heroicon-o-location-marker class="absolute top-3 left-1.5 w-6 h-6 text-gray-500" />
                            <select id="location" name="location"
                                class="border-0 border-l focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block w-full mt-1 pl-8">
                                <option>{{ __('Tout le Senegal') }}</option>
                                <option value="dakar">Dakar</option>
                                <option value="thies">Thies</option>
                                <option value="saint_louis">Saint-Louis</option>
                            </select>
                        </div>
                        <div style="width: 115px;">
                            <button type="submit"
                                class="inline-flex items-center mt-1 px-4 py-2 rounded-r-md w-full font-semibold text-white bg-red-400 hover:bg-red-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Rechercher') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="flex max-w-7xl mx-auto px-8 sm:px-12 lg:px-16">
                <div class="flex-1">
                    <div class="w-full flex justify-between items-center">
                        <span class="block mb-3">Résultat de recherche: 1</span>
                        <span class="block mb-3">Trier par: </span>
                    </div>
                    <div class="mt-4 overflow-y-scroll" style="height: 72vh;">
                        @foreach ($jobs as $job)
                        <x-job-card :job="$job" />
                        @endforeach
                    </div>
                </div>
                <div class="w-1/3 px-6">&nbsp;</div>
            </div>
        </main>
    </div>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>

</html>
