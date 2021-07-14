<x-app-layout>
    <x-header>Gestion des grades</x-header>

    <x-card.card>
        <x-card.header>
            Liste des grades
            <x-slot name="action">
                <x-card.create-btn :href="route('parametre.grade.create')">Nouveau grade</x-card.create-btn>
            </x-slot>
        </x-card.header>

        <table class="w-full">
            <tr class="border-b-2">
                <th class="py-2">Libelle court</th>
                <th>Libelle long</th>
            </tr>
            @forelse($grades as $grade)
                <tr class="cursor-pointer hover:bg-gray-100 border-b" data-action="{{ route('parametre.grade.edit', $grade) }}">
                    <td class="py-2 px-4">{{ $grade->lib_court }}</td>
                    <td class="py-2 px-4">{{ $grade->lib_long }}</td>
                </tr>
            @empty
                <tr>
                    <td class="py-2 text-center" colspan="2">Aucun grade créé</td>
                </tr>
            @endforelse
        </table>

    </x-card.card>

</x-app-layout>
