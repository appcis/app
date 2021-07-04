<x-app-layout>
    <x-header>Gestion des utilisateurs</x-header>

    <x-card.card>
        <x-card.header>
            Nouvel utilisateur
        </x-card.header>

        <form action="{{ route('utilisateur.store') }}" method="POST">
            @csrf

            <div class="px-4 py-2">

                <label class="block mb-2">
                    <span class="text-gray-700">Nom</span>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" name="name">
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Email</span>
                    <input type="email" class="mt-1 block w-full border-gray-300 rounded-md" name="email">
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Mot de passe</span>
                    <input type="password" class="mt-1 block w-full border-gray-300 rounded-md" name="password">
                </label>
            </div>

            <div class="px-4 py-2 flex justify-end items-center space-x-2">
                <x-form.cancel-btn :href="route('utilisateur.index')"></x-form.cancel-btn>
                <x-form.submit-btn></x-form.submit-btn>
            </div>

        </form>


    </x-card.card>


</x-app-layout>
