<x-app-layout>
    <x-header>Gestion des utilisateurs</x-header>

    <x-card.card>
        <x-card.header>Liste des utilisateurs</x-card.header>

        <table class="w-full">
            <tr class="border-b-2">
                <th class="py-2">Nom</th>
                <th>Email</th>
            </tr>
            @forelse($users as $user)
                <tr class="cursor-pointer hover:bg-gray-100" data-action="{{ route('utilisateur.edit', $user) }}">
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                </tr>
            @empty
                <tr>
                    <td class="py-2" colspan="2">Aucun utilisateurs existant</td>
                </tr>
            @endforelse
        </table>

    </x-card.card>

</x-app-layout>
