<!-- This example requires Tailwind CSS v2.0+ -->
<div id="modal" :class="{'hidden': !opened }" class="hidden fixed z-10 inset-0 overflow-y-auto"
    aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <form method="POST" action={{route('job.cat.create')}}
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="pt-4 px-6">
                <h3 class="text-lg font-black leading-6 text-gray-900">
                    {{ __('Créer une nouvelle catégorie') }}
                </h3>
            </div>
            @csrf
            <div class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start w-full ">
                    <div class="mt-4">
                        <x-label for="name" :value="__('Nom categorie')" />

                        <input id="name"
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                            type="text" name="name" required />
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Ajouter
                </button>
                <button type="button" @click="opened = ! opened"
                    class="close-modal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Annuler
                </button>
            </div>
        </form>
    </div>
</div>
