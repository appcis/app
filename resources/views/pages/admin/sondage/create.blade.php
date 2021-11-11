<x-app-layout>
    <x-header>Gestion des sondages</x-header>

    <x-card.card>
        <x-card.header>
            Nouveau sondage
        </x-card.header>

        <form action="{{ route('admin.sondage.store') }}" method="POST">
            @csrf

            <div class="px-4 py-2">

                <label class="block mb-2">
                    <span class="text-gray-700">Libelle</span>
                    <textarea name="libelle" id="libelle" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Description</span>
                    <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                </label>
            </div>

            <div class="px-4 py-2 flex justify-end items-center space-x-2">
                <x-form.cancel-btn :href="route('admin.sondage.index')"></x-form.cancel-btn>
                <x-form.submit-btn></x-form.submit-btn>
            </div>

        </form>


    </x-card.card>


</x-app-layout>
