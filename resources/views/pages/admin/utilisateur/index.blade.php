<x-app-layout>
    <x-header>Gestion des utilisateurs</x-header>

    <x-card.card>
        <x-card.header>
            Liste des utilisateurs
            <x-slot name="action">
                <x-card.create-btn :href="route('admin.utilisateur.create')">Nouvel utilisateur</x-card.create-btn>
            </x-slot>
        </x-card.header>

        <table class="w-full">
            <tr class="border-b-2">
                <th class="py-2">Nom</th>
                <th>Email</th>
            </tr>
            @forelse($users as $user)
                <tr class="cursor-pointer hover:bg-gray-100 border-b" data-action="{{ route('admin.utilisateur.edit', $user) }}">
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
