<x-app-layout>
    <x-header>Gestion des agents</x-header>

    <x-card.card>
        <x-card.header>
            Edition agent
        </x-card.header>

        <form action="{{ route('admin.agent.update', $agent) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="px-4 py-2">

                <label class="block mb-2">
                    <span class="text-gray-700">Nom</span>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" name="nom"
                           value="{{ $agent->nom }}">
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Prénom</span>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md" name="prenom"
                           value="{{ $agent->prenom }}">
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Téléphone</span>
                    <input type="tel" class="mt-1 block w-full border-gray-300 rounded-md" name="phone"
                           value="{{ $agent->phone }}">
                </label>

                <label class="block mb-2">
                    <span class="text-gray-700">Groupes</span>
                    @isset($groupes)
                        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-1 mt-2">
                            @foreach($groupes as $groupe)
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" value="{{ $groupe->id }}" name="groupes[]" @if($agent->groupes->contains($groupe->id))checked="checked" @endif>
                                        <span class="ml-2">{{ $groupe->name }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endempty
                </label>
            </div>

            <div class="px-4 py-2 flex justify-end items-center space-x-2">
                <button type="button" @click="open = true" x-show="! open"
                        class="shadow border border-red-600 bg-red-600 px-6 py-2 block rounded-md hover:bg-red-700 text-gray-50 mr-auto">
                    Supprimer
                </button>
                <x-form.cancel-btn :href="route('admin.agent.index')"></x-form.cancel-btn>
                <x-form.submit-btn></x-form.submit-btn>
            </div>

        </form>

        <div class="bg-red-50 p-4 border border-red-900 rounded-md m-4" x-show="open">
            <div class="text-red-900 text-center mb-4" @click="open = false">
                Confirmer la supression d'un agent
            </div>
            <form action="{{ route('admin.agent.destroy', $agent) }}" method="POST">
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

</x-app-layout>
