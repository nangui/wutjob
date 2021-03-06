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
                            <form method="POST" action={{ route('user.job.store') }} class="w-full">
                                @csrf
                                <div class="w-full flex gap-5">

                                    <div class="w-1/2">
                                        <x-label for="title" :value="__('Titre')" />

                                        <input id="title" placeholder="Entrer le titre du post"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="text" name="title" required autofocus />
                                    </div>

                                    <div class="w-1/2">
                                        <x-label for="enterprise" :value="__('Entreprise')" />

                                        <input id="enterprise" placeholder="Entrer le nom de l'entreprise"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="text" name="enterprise" required />
                                    </div>

                                </div>

                                <div class="w-full flex gap-5">
                                    <!-- spediality -->
                                    <div class="mt-4 w-1/2">
                                        <x-label for="speciality" :value="__('Sp??cialit??')" />

                                        <input id="speciality" placeholder="Entrer la specialit?? recherch??e"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="text" name="speciality" required />
                                    </div>

                                    <!-- Experience -->
                                    <div class="mt-4 w-1/2">
                                        <x-label for="experience" :value="__('Experience (ann??e)')" />

                                        <input id="experience" placeholder="Ann??e d'experience"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="number" min="1" name="experience" required />
                                    </div>

                                </div>

                                <div class="w-full flex gap-5">
                                    <!-- salary -->
                                    <div class="mt-4 w-1/2">
                                        <x-label for="salary" :value="__('Salaire')" />

                                        <input id="salary" placeholder="Entrer le salaire"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="number" name="salary" required />
                                    </div>

                                    <!-- work_type -->
                                    <div class="mt-4 w-1/2">
                                        <x-label for="work_type" :value="__('Type Travail')" />

                                        <select id="work_type" name="work_type"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                                            <option>Selectionner un type</option>
                                            <option value="full_time">A plein temps</option>
                                            <option value="part_time">A temps partiel</option>
                                            <option value="stage">Stage</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="w-full flex gap-5">
                                    <!-- location -->
                                    <div class="mt-4 w-1/2">
                                        <x-label for="location" :value="__('Ville')" />

                                        <select id="location" name="location"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                                            <option>Selectionner une ville</option>
                                            <option value="dakar">Dakar</option>
                                            <option value="thies">Thies</option>
                                            <option value="saint_louis">Saint-louis</option>
                                        </select>
                                    </div>

                                    <!-- Categorie -->
                                    <div class="mt-4 w-1/2">
                                        <x-label for="category_id" :value="__('Categorie')" />

                                        <select id="category_id" name="category_id"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
                                            <option>Selectionner une categorie</option>
                                            @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-4 w-full flex gap-5">

                                    <!-- Experience -->
                                    <div class="mt-4 w-1/2">
                                        <x-label for="due_date" :value="__('Date de fin')" />

                                        <input id="due_date"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                            type="date" name="due_date" required />
                                    </div>

                                    <!-- Description -->
                                    <div class="mt-4 w-1/2">
                                        <x-label for="description" :value="__('Description')" />

                                        <textarea id="description" placeholder="Entrer la description"
                                            name="description"
                                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"></textarea>
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
