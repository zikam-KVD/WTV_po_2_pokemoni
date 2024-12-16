<x-app-layout>
    @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
    @endif
    <section class="section--white">
        <form action="{{ route('pridejTyp')}}" method="POST">
            @csrf
            <div>
                <label for="nazev">Název:</label>
                <input id="nazev" maxlength="65" type="text" name="typ-nazev" placeholder="Zadej název" required>
            </div>
            <div>
                <label for="barva">Barva:</label>
                <input id="barva" type="color" name="typ-barva">
            </div>
            <div>
                <x-button>Potvrď</x-button>
            </div>
        </form>
    </section>

    <section class="section--white">
        <form action="{{ route('pridejPokemona')}}" method="POST">
            @csrf

            <div>
                <x-button>Potvrď</x-button>
            </div>
        </form>
    </section>

    <section class="section--white">
        <table>
            <tr>
                <th>Název</th>
                <th>Barva</th>
                <th>Počet pokémonů</th>
                <th> </th>
            </tr>
            @foreach ($tipy as $typ)
            <tr>
                <td>{{ $typ->nazev }}</td>
                <td style="background: {{ $typ->barva }}">{{ $typ->barva }}</td>
                <td>{{ count($typ->pokemons) }}</td>
                <td> mažu/edituji </td>
            </tr>
            @endforeach
        </table>
    </section>
</x-app-layout>

