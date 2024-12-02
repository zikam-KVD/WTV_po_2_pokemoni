<x-guest-layout>
    <main>
        @foreach ($pokemonos as $poke)
        <div class="card">
            <img
                src="images/{{ $poke->id }}.jpg"
                alt="{{ $poke->nazev }}"
            >
            <a href="{{ route('detail', ['cislo' => $poke->id]) }}">
                <i class="fa-solid fa-question"></i>
            </a>
        </div>
        @endforeach

       </main>
</x-guest-layout>
