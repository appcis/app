<x-app-layout>
    <x-header>Sondage en cours</x-header>


        @forelse($sondages as $sondage)
        <x-card.card class="mb-4">
            <x-card.header>{{ $sondage->libelle }}</x-card.header>
            <div class="border p-2">
                <h2></h2>
                <p>{{ $sondage->description }}</p>
                <div>
                    @foreach($sondage->reponses as $reponse)
                        {{ $reponse }}
                    @endforeach
                </div>
            </div>
        </x-card.card>
        @empty
        @endforelse

</x-app-layout>
