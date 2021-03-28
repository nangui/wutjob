<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="flex py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @include('layouts.left-nav')

        <div class="flex-1">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-black leading-6 text-gray-900">
                                    Informations personnelles
                                </h3>
                            </div>
                        </div>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="mt-5">
                            @if (session('status'))
                            <div class="bg-green-300 text-white p-2 mb-4 rounded-sm">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form method="POST" action={{ route('updateUser', Auth::user()) }} class="w-full">
                                @csrf
                                <input type="hidden" name="basic" value="true" />
                                <div class="w-full flex gap-5">
                                    <!-- Nom -->
                                    <div class="w-1/2">
                                        <x-label for="lastname" :value="__('Nom')" />

                                        <input id="lastname"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="text" name="lastname" value={{ Auth::user()->lastname }} required
                                            autofocus />
                                    </div>

                                    <!-- Prénom -->
                                    <div class="w-1/2">
                                        <x-label for="firstname" :value="__('Prénom')" />

                                        <input id="firstname"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="text" name="firstname" value={{ Auth::user()->firstname }} required />
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-label for="email" :value="__('Email')" />

                                    <input id="email"
                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-1/2"
                                        type="email" name="email" value={{ Auth::user()->email }} required />
                                </div>

                                <button type="submit"
                                    class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Enregistrer') }}
                                </button>
                            </form>
                        </div>
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-black leading-6 text-gray-900 mt-10">
                                    Modification du mot de passe
                                </h3>
                            </div>
                        </div>
                        <div class="mt-5">
                            @if (session('passwordStatus'))
                            <div class="bg-green-300 text-white p-2 mb-4 rounded-sm">
                                {{ session('passwordStatus') }}
                            </div>
                            @endif
                            <form method="POST" action={{ route('updateUser', Auth::user()) }}>
                                @csrf
                                <div>
                                    <x-label for="password" :value="__('Entrer le mot de passe actuel')" />

                                    <x-input id="password" class="block mt-1 w-1/2" type="password" name="pass"
                                        required />
                                </div>

                                <div class="w-full flex gap-5 mt-4">

                                    <div class="w-1/2">
                                        <x-label for="password" :value="__('Entrer le nouveau mot de passe')" />

                                        <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                            required />
                                    </div>

                                    <div class="w-1/2">
                                        <x-label for="password_confirmation"
                                            :value="__('Confirmer le nouveau mot de passe')" />

                                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                            name="password_confirmation" required />
                                    </div>

                                </div>

                                <button type="submit"
                                    class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Modifier') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
