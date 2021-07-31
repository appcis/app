<x-app-layout>
    <x-header>SMS</x-header>

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
