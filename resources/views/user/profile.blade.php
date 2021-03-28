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
                                    Curriculum Vitae
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
                            <form method="POST" action={{ route('user.cv.store') }} class="w-full">
                                @csrf
                                <div class="w-full flex gap-5">
                                    <!-- Age -->
                                    <div class="w-1/4">
                                        <x-label for="age" :value="__('Age')" />

                                        <input id="age"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            min="18" type="number" name="age" required autofocus />
                                    </div>

                                    <div class="w-1/4">
                                        <x-label for="address" :value="__('Adresse')" />

                                        <textarea id="address" name="address"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"></textarea>
                                    </div>

                                    <!-- Phone -->
                                    <div class="w-1/4">
                                        <x-label for="phone" :value="__('Numéro de Téléphone')" />

                                        <input id="phone"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="tel" inputmode="numeric" name="phone" required />
                                    </div>

                                    <!-- spediality -->
                                    <div class="w-1/4">
                                        <x-label for="speciality" :value="__('Spécialité')" />

                                        <input id="speciality"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="text" name="speciality" required />
                                    </div>
                                </div>

                                <div class="w-full flex gap-5">
                                    <!-- Level -->
                                    <div class="mt-4">
                                        <x-label for="level" :value="__('Niveau')" />

                                        <input id="level"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1"
                                            type="text" name="level" required />
                                    </div>

                                    <!-- Experience -->
                                    <div class="mt-4">
                                        <x-label for="experience" :value="__('Experience')" />

                                        <input id="experience"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1"
                                            type="number" min="1" name="experience" required />
                                    </div>
                                </div>


                                <button type="submit"
                                    class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Enregistrer') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
