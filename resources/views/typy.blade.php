<x-guest-layout>
       <main id="typy">

        @if(count($pokemonos) == 0)
            <p>Tenhle typ existuje, ale nenašel jsem žádného pokémona.</p>
        @else
            @foreach ($pokemonos as $poke)
            <div class="card">
                <img
                    src="{{ asset('images/' . $poke->id . '.jpg') }}"
                    alt="{{ $poke->nazev }}"
                >
                <a href="{{ route('detail', ['cislo' => $poke->id]) }}">
                    <i class="fa-solid fa-question"></i>
                </a>
            </div>
            @endforeach
        @endif

       </main>
</x-guest-layout>
