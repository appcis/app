<x-app-layout>
    <x-header>Gestion des agents</x-header>

    <x-card.card>
        <x-card.header>
            Liste des agents
            <x-slot name="action">
                <x-card.create-btn :href="route('agent.create')">Nouvel agent</x-card.create-btn>
            </x-slot>
        </x-card.header>

        <table class="w-full">
            <tr class="border-b-2">
                <th class="py-2">Nom</th>
                <th>Prenom</th>
                <th>Téléphone</th>
            </tr>
            @forelse($agents as $agent)
                <tr class="cursor-pointer hover:bg-gray-100 border-b" data-action="{{ route('agent.edit', $agent) }}">
                    <td class="py-2 px-4">{{ $agent->nom }}</td>
                    <td class="py-2 px-4">{{ $agent->prenom }}</td>
                    <td class="py-2 px-4">{{ $agent->phone }}</td>
                </tr>
            @empty
                <tr>
                    <td class="py-2 text-center" colspan="3">Aucun agent créer</td>
                </tr>
            @endforelse
        </table>

    </x-card.card>

</x-app-layout>
