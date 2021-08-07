<x-app-layout>
    <x-header>
        <div class="flex items-center">
            <span>SMS</span>
            <div class="flex flex-col ml-10 items-center">
                <span @class([
                'rounded-full px-3 py-0.5 text-xs font-bold text-white',
                'bg-green-600' => $sms->etat_envoi === 'ENVOYE',
                'bg-blue-600' => $sms->etat_envoi === 'EN_COURS',
                'bg-yellow-600' => $sms->etat_envoi === 'ATTENTE',
                ])>{{ $sms->etat_envoi }}</span>
                <span class="text-right italic text-xs text-gray-500">{{ $sms->created_at->isoFormat('ddd D MMM YY') }} à  {{ $sms->created_at->isoFormat('HH:mm') }}</span>
            </div>
        </div>
    </x-header>

    <x-card.card>
        <x-card.header>Message</x-card.header>
        <div class="px-4 py-2">
            <div class="mb-2">
                {{ $sms->message }}
            </div>
        </div>
    </x-card.card>

    <x-card.card class="mt-4">
        <x-card.header><span class="rounded-full px-2 text-xs font-bold text-indigo-600 border border-indigo-600">{{ $sms->agents->count() }}</span> Destinataires</x-card.header>
        <div class="px-4 py-2">
            <div class="mb-2">
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 mt-2">
                    @foreach($sms->agents as $agent)
                        <div>
                            <div class="items-center">
                                {{ $agent->nom }} {{ $agent->prenom }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </x-card.card>

</x-app-layout>
