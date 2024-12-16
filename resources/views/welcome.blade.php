<x-guest-layout>
    <main>
        @foreach ($pokemonos as $poke)
        <div class="card">
            <img
                {{-- TODO: dodelat do repa --}}
                @if(file_exists(public_path("images/". $poke->id .".jpg")))
                    src="images/{{ $poke->id }}.jpg"
                @else
                    src="images/{{ $poke->id }}.png"
                @endif

                alt="{{ $poke->nazev }}"
            >
            <a href="{{ route('detail', ['cislo' => $poke->id]) }}">
                <i class="fa-solid fa-question"></i>
            </a>
        </div>
        @endforeach

       </main>
</x-guest-layout>
