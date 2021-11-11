<x-app-layout>
    <x-header>Gestion des sondages</x-header>

    <x-card.card>
        <x-card.header>
            Liste des sondgaes
            <x-slot name="action">
                <x-card.create-btn :href="route('admin.sondage.create')">Nouveau sondage</x-card.create-btn>
            </x-slot>
        </x-card.header>

        <table class="w-full">
            <tr class="border-b-2">
                <th class="py-2">Libelle</th>
                <th>Description</th>
            </tr>
            @forelse($sondages as $sondage)
                <tr class="cursor-pointer hover:bg-gray-100 border-b" data-action="{{ route('admin.sondage.edit', $sondage) }}">
                    <td class="py-2 px-4">{{ $sondage->libelle }}</td>
                    <td class="py-2 px-4">{{ $sondage->description }}</td>
                </tr>
            @empty
                <tr>
                    <td class="py-2 text-center" colspan="2">Aucun sondage créer</td>
                </tr>
            @endforelse
        </table>

    </x-card.card>

</x-app-layout>
