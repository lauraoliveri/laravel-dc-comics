@extends('layouts.app')

@section('page-title', 'Modifica')

@section('main-content')

{{-- Titolo pagina --}}
<h1>
    Modifica {{ $comic->title }}
</h1>

{{-- Form per modificare le info --}}


<form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Modifica del titolo --}}
    <div class="mb-3">
        <label for="title" class="form-label">
            Titolo 
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            class="form-control" @error('title') is-invalid @enderror"
            id="title"
            name="title"
            required
            maxlength="64"
            placeholder="Inserisci il titolo del fumetto"
            value="{{ ('title', $comic->title) }}">

        {{-- In caso di errore nel titolo --}}
        @error('title')
            <div class="alert alert-danger m-2">
                Errore titolo: {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Modifica del tipo --}}
    <div class="mb-3">
        <label for="type" class="form-label">
            Tipo 
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            class="form-control" @error('type') is-invalid @enderror"
            id="title"
            name="type"
            required
            maxlength="64"
            placeholder="Inserisci il tipo di fumetto"
            value="{{ ('title', $comic->type) }}">

        {{-- In caso di errore del tipo --}}
        @error('type')
            <div class="alert alert-danger mt-1">
                Errore tipo: {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Modifica della serie --}}
    <div class="mb-3">
        <label for="cooking_time" class="form-label">
            Serie
        </label>

        <input
            type="text"
            class="form-control @error('series') is-invalid @enderror"
            id="series"
            name="series"
            min="0"
            placeholder="Inserisci la serie del fumetto"
            value="{{ ('series', $comic->series) }}">



        {{-- In caso di errore nella serie --}}
        @error('series')
            <div class="alert alert-danger mt-1">
                Errore serie: {{ $message }}
            </div>
        @enderror
    </div>


     {{-- Modifica Prezzo --}}

     <div class="mb-3">
        <label for="price" class="form-label">
            Prezzo
            <span class="text-danger">*</span>
        </label>
        <textarea
            required
            maxlength="64"
            name="price"
            class="form-control" @error('price') is-invalid @enderror"
            id="price"
            placeholder="Scrivi il prezzo">{{ $comic->price }}
        </textarea>

        {{-- In caso di errore nella Prezzo --}}
        @error('price')
            <div class="alert alert-danger my-4">
                Errore Prezzo: {{ $message}}
            </div>
        @enderror
    </div>

    {{-- Modifica descrizione --}}

    <div class="mb-3">
        <label for="description" class="form-label">
            Descrizione
            <span class="text-danger">*</span>
        </label>
        <textarea
            required
            maxlength="4096"
            name="description"
            class="form-control" @error('description') is-invalid @enderror"
            id="description"
            placeholder="Scrivi la descrizione...">{{ $comic->description }}
        </textarea>

        {{-- In caso di errore nella descrizione --}}
        @error('description')
            <div class="alert alert-danger my-4">
                Errore descrizione: {{ $message}}
            </div>
        @enderror
    </div>

    {{-- Bottone per aggiornare --}}
    <div class="text-center">
        <button type="submit" class="btn btn-warning w-100">
            Aggiorna
        </button>

        {{-- Per annullare e tornare alla pagina --}}
        <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-secondary mt-3">
            Annulla
        </a>
    </div>

</form>