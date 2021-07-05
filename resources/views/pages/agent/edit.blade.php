<x-app-layout>
    <x-header>Gestion des agents</x-header>

    <x-card.card>
        <x-card.header>
            Edition agent
        </x-card.header>

        <form action="{{ route('agent.update', $agent) }}" method="POST">
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
                <x-form.cancel-btn :href="route('agent.index')"></x-form.cancel-btn>
                <x-form.submit-btn></x-form.submit-btn>
            </div>

        </form>

    </x-card.card>

</x-app-layout>
