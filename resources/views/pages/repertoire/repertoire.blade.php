<x-app-layout>
    <x-header>Repertoire</x-header>

    <x-card.card>
        <table class="w-full">
            <tr class="border-b-2">
                <th class="py-2">Agent</th>
                <th>Téléphone</th>
            </tr>
            @forelse($agents as $agent)
                <tr class="cursor-pointer hover:bg-gray-100 border-b">
                    <td class="py-2 px-4">{{ $agent->nom }} {{ $agent->prenom }}</td>
                    <td class="py-2 px-4"><a href="tel:{{ $agent->phone }}"></a>{{ $agent->phone }}</td>
                </tr>
            @empty
                <tr>
                    <td class="py-2 text-center" colspan="2">Aucun agent créer</td>
                </tr>
            @endforelse
        </table>

    </x-card.card>

</x-app-layout>
