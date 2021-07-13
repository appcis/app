<x-app-layout>
    <x-header>SMS</x-header>

    <x-card.card>
        <x-card.header>Envoyer un SMS</x-card.header>

        <form action="{{ route('sms') }}" method="POST">
            @csrf

            <div class="px-4 py-2">

                <label class="block mb-2">
                    <span class="text-gray-700">Message</span>
                    <textarea class="mt-1 block w-full border-gray-300 rounded-md" rows="3" name="message"></textarea>
                </label>

                <div class="mb-2">
                    <span class="text-gray-700">Destinataires</span>
                    @isset($groupes)
                        <div class="flex flex-wrap space-x-2 justify-center">
                            @foreach($groupes as $groupe)
                                <button data-agent="{{ $groupe['agents'] }}" type="button" class="px-4 py-0 my-1 border border-primary-900 rounded-full shadow-md bg-primary-600 text-gray-100 hover:bg-indigo-900">{{ $groupe['name'] }}</button>
                            @endforeach
                                <button id="clear" type="button" class="px-4 py-0 my-1 border border-primary-600 rounded-full shadow-md bg-white text-primary-600 hover:bg-indigo-900 hover:text-primary-50">Effacer la selection</button>
                        </div>
                    @endisset
                    @isset($agents)
                        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 mt-2">
                            @foreach($agents as $agent)
                                <div>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" value="{{ $agent->id }}" name="agents[]">
                                        <span class="ml-2">{{ $agent->nom }} {{ $agent->prenom }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endempty
                </div>

            </div>

            <div class="px-4 py-2 flex justify-end items-center space-x-2">
                <input type="submit" value="Envoyer"
                       class="shadow bg-primary-600 px-6 py-2 block rounded hover:bg-primary-700 text-gray-100 hover:text-white border border-primary-700 rounded-md cursor-pointer">
            </div>

        </form>

    </x-card.card>

</x-app-layout>
