@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')

    {{-- Titolo --}}
    <h1>
        Fumetti
    </h1>


    <div class="mb-4">
        <a href="{{ route('comics.create') }}" class="btn btn-success w-100">
            + Aggiungi fumetto
        </a>
    </div>


    {{-- Lista dei fumetti --}}

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Series</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Data di rilascio</th>
          </tr>
        </thead>


        <tbody>

            @foreach ($comics as $comic)
            <tr>
                <th scope="row">{{ $comic->id }}</th>
                <td>{{ $comic->title }}</td>
                <td>{{ $comic->type }}</td>
                <td>{{ $comic->series }}</td>
                <td>{{ $comic->price }}</td>
                <td>{{ $comic->description }}</td>
                <td>{{ $comic->sale_date }}</td>

                {{-- Per aggiungere, modificare ecc --}}
                <td>
                    <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">
                        Mostra fumetto
                    </a>

                    <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning">
                        Modifica
                    </a>

                    {{-- Per eliminare --}}
                    <form
                        onsubmit="return confirm('Sei sicur* di voler cancellare questa comic?');"
                        action="{{ route('comics.destroy', ['comic' => $comic->id]) }}"
                        method="POST"
                        class="d-inline-block">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Elimina
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection