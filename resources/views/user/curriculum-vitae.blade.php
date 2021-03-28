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
                            <div class="px-4 sm:px-0 mb-4">
                                <h3 class="text-lg font-black leading-6 text-gray-900">
                                    Mon CV
                                </h3>
                            </div>
                        </div>
                        <ul class="flex flex-col space-y-2 w-2/3">
                            <li class="flex justify-between p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
                                <span>Nom</span>
                                <span class="font-bold">
                                    {{ Auth::user()->lastname }}
                                </span>
                            </li>
                            <li class="flex justify-between p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
                                <span>Prénom</span>
                                <span class="font-bold">
                                    {{ Auth::user()->firstname }}
                                </span>
                            </li>
                            <li class="flex justify-between p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
                                <span>Age</span>
                                <span class="font-bold">
                                    {{ Auth::user()->cv->age }} ans
                                </span>
                            </li>
                            <li class="flex justify-between p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
                                <span>Adresse</span>
                                <span class="font-bold">
                                    {{ Auth::user()->cv->address }}
                                </span>
                            </li>
                            <li class="flex justify-between p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
                                <span>Spécialité</span>
                                <span class="font-bold">
                                    {{ Auth::user()->cv->speciality }}
                                </span>
                            </li>
                            <li class="flex justify-between p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
                                <span>Email</span>
                                <span class="font-bold">
                                    {{ Auth::user()->email }}
                                </span>
                            </li>
                            <li class="flex justify-between p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
                                <span>Téléphone</span>
                                <span class="font-bold">
                                    {{ Auth::user()->cv->phone }}
                                </span>
                            </li>
                            <li class="flex justify-between p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
                                <span>Niveau d'etude</span>
                                <span class="font-bold">
                                    {{ Auth::user()->cv->level }}
                                </span>
                            </li>
                            <li class="flex justify-between p-2 hover:bg-gray-100 cursor-pointer sm:rounded-lg">
                                <span>Experience professionnelle</span>
                                <span class="font-bold">
                                    {{ Auth::user()->cv->experience }} ans
                                </span>
                            </li>
                        </ul>
                        <a href={{ route('user.cv.edit') }}
                            class="mt-8 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 w-1/3 text-center">Editer
                            le curiculum vitae</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
