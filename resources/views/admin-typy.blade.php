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
        <form action="{{ route('pridejPokemona')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <x-label for="nazev" value="Název pokémona" />
                <x-input name="pokemon-nazev" id="nazev" required />
                <x-input-error for="pokemon-nazev" />
            </div>
            <div>
                <x-label for="popis" value="Popis pokémona" />
                <x-input name="pokemon-popis" id="popis" required />
                <x-input-error for="pokemon-popis" />
            </div>
            <div>
                <x-label for="druh" value="Druh pokémona" />
                <select name="pokemon-druh" id="druh">
                    @foreach ($tipy as $typ)
                        <option value="{{ $typ->id }}">{{ $typ->nazev }}</option>
                    @endforeach
                </select>
                <x-input-error for="pokemon-druh" />
            </div>
            <div>
                <x-label for="obrazek" value="Obrázek pokémona" />
                <x-input type="file" name="pokemon-obrazek" id="obrazek" required />
                <x-input-error for="pokemon-obrazek" />
            </div>
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
                <td>
                    <form action="{{ route('smazTyp', ['id' => $typ->id])  }}" method="post">
                        @csrf
                        <x-button>Smaž mě</x-button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </section>
</x-app-layout>

