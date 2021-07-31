<x-app-layout>
    <x-header>Historique SMS</x-header>


    <div class="px-4 flex flex-col space-y-4">
        @forelse($messages as $sms)
        <div class="bg-white border rounded shadow">
            <div class="flex px-2 py-1">
                <div class="mr-auto text-sm">
                    {{ $sms->message }}
                </div>
                <div class="text-right ml-3">
                    <span @class([
                    'rounded-full px-3 py-0.5 text-xs font-bold text-white',
                    'bg-green-600' => $sms->etat_envoi === 'ENVOYE',
                    'bg-blue-600' => $sms->etat_envoi === 'EN_COURS',
                    'bg-yellow-600' => $sms->etat_envoi === 'ATTENTE',
                    ])>{{ $sms->etat_envoi }}</span>
                    <span class="rounded-full px-2 text-xs font-bold text-indigo-600 border border-indigo-600">{{ $sms->agents->count() }}</span>
                </div>
            </div>
            <div class="text-right px-2">
                <span class="text-right italic text-xs text-gray-500">{{ $sms->created_at->isoFormat('ddd D MMM YY') }} à  {{ $sms->created_at->isoFormat('HH:mm') }}</span>
            </div>
        </div>
        @empty
        <tr>Aucun SMS envoyé</tr>
        @endforelse
    </div>


</x-app-layout>
