<x-app-layout>
    <x-header>Gestion des utilisateurs</x-header>
    <div x-data="{ open: false }">
    <x-card.card>
        <x-card.header>
            Edition utilisateur
        </x-card.header>
        <form action="{{ route('utilisateur.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="px-4 py-2">

                <label class="block mb-2">
                    <span class="text-gray-700">Nom</span>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" name="name"
                           value="{{ $user->name }}">
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Email</span>
                    <input type="email" class="mt-1 block w-full border-gray-300 rounded-md" name="email"
                           value="{{ $user->email }}">
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Mot de passe</span>
                    <input type="password" class="mt-1 block w-full border-gray-300 rounded-md" name="password">
                </label>
            </div>

            <div class="px-4 py-2 flex justify-end items-center space-x-2">
                <button type="button" @click="open = true" x-show="! open"
                    class="shadow border border-red-600 bg-red-600 px-6 py-2 block rounded-md hover:bg-red-700 text-gray-50 mr-auto">
                    Supprimer
                </button>
                <x-form.cancel-btn :href="route('utilisateur.index')"></x-form.cancel-btn>
                <x-form.submit-btn></x-form.submit-btn>
            </div>

        </form>

        <div class="bg-red-50 p-4 border border-red-900 rounded-md m-4" x-show="open">
            <div class="text-red-900 text-center mb-4" @click="open = false">
                Confirmer la supression d'un utilisateur
            </div>
            <form action="{{ route('utilisateur.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex items-center justify-center space-x-2">
                    <button type="button" @click="open = false"
                        class="shadow border border-green-600 bg-green-600 px-6 py-2 block rounded-md hover:bg-green-700 text-gray-50">
                        Annuler
                    </button>
                    <input type="submit" value="Supprimer"
                           class="shadow border border-red-600 bg-red-600 px-6 py-2 block rounded-md hover:bg-red-700 text-gray-50 cursor-pointer">
                </div>
            </form>
        </div>

    </x-card.card>
    </div>


</x-app-layout>
