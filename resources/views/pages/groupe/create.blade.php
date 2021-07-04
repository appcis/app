<x-app-layout>
    <x-header>Gestion des groupes</x-header>

    <x-card.card>
        <x-card.header>
            Nouveau groupe
        </x-card.header>

        <form action="{{ route('groupe.store') }}" method="POST">
            @csrf

            <div class="px-4 py-2">

                <label class="block mb-2">
                    <span class="text-gray-700">Nom</span>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" name="name">
                </label>

                <label class="block">
                    <span class="text-gray-700">Description</span>
                    <textarea class="mt-1 block w-full border-gray-300 rounded-md" rows="3" name="description"></textarea>
                </label>
            </div>

            <div class="px-4 py-2 flex justify-end items-center">
                <x-form.cancel-btn :href="route('groupe.index')"></x-form.cancel-btn>
                <x-form.submit-btn></x-form.submit-btn>
            </div>

        </form>


    </x-card.card>


</x-app-layout>
