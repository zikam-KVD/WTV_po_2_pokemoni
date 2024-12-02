<x-guest-layout>
    <main class="detail">
        <div class="card">
            <h2> {{ $poke->nazev }} </h2>
            <img
                src="{{ asset('images/' . $poke->id . '.jpg') }}"
                alt="{{ $poke->nazev }}"
            >
            <div class="typy">
                <a href="{{ route('typy', ['typ' => $poke->druh]) }}">
                <span style="background: {{ $poke->typ->barva }}">
                    {{ $poke->typ->nazev }}
                </span>
                </a>
            </div>
            <p>{{ $poke->popis }}</p>
            <a href="{{ route('index') }}">
                <i class="fa-solid fa-left-long"></i>
            </a>
        </div>
    </main>
</x-guest-layout>
