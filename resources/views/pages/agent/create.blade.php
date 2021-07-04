<x-app-layout>
    <x-header>Gestion des agents</x-header>

    <x-card.card>
        <x-card.header>
            Nouvel agent
        </x-card.header>

        <form action="{{ route('agent.store') }}" method="POST">
            @csrf

            <div class="px-4 py-2">

                <label class="block mb-2">
                    <span class="text-gray-700">Nom</span>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" name="nom">
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Prénom</span>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" name="prenom">
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Téléphone</span>
                    <input type="tel" class="mt-1 block w-full border-gray-300 rounded-md" name="phone">
                </label>
            </div>

            <div class="px-4 py-2 flex justify-end items-center space-x-2">
                <x-form.cancel-btn :href="route('agent.index')"></x-form.cancel-btn>
                <x-form.submit-btn></x-form.submit-btn>
            </div>

        </form>


    </x-card.card>


</x-app-layout>
