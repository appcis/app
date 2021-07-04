<x-app-layout>
    <x-header>Gestion des groupes</x-header>

    <x-card.card>
        <x-card.header>
            Liste des groupes
            <x-slot name="action">
                <a href="{{ route('groupe.create') }}" class="border shadow px-6 py-2 block rounded hover:bg-gray-100">Nouveau groupe</a>
            </x-slot>
        </x-card.header>

        <table class="w-full">
            <tr class="border-b-2">
                <th class="py-2">Nom</th>
                <th>Description</th>
            </tr>
            @forelse($groupes as $groupe)
                <tr class="cursor-pointer hover:bg-gray-100 border-b" data-action="{{ route('groupe.edit', $groupe) }}">
                    <td class="py-2 px-4">{{ $groupe->name }}</td>
                    <td class="py-2 px-4">{{ $groupe->description }}</td>
                </tr>
            @empty
                <tr>
                    <td class="py-2 text-center" colspan="2">Aucun groupe créer</td>
                </tr>
            @endforelse
        </table>

    </x-card.card>

</x-app-layout>
