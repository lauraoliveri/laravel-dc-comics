@extends('layouts.app')

@section('page-title', 'Create a new Comic')

@section('main-content')

<h1>
    Crea un nuovo fumetto!
</h1>


<form action="{{ route('comics.store') }}" method="POST">


    @csrf


        {{-- Aggiunta del titolo --}}
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
            placeholder="Inserisci il titolo del fumetto">

        {{-- In caso di errore nel titolo --}}
        @error('title')
            <div class="alert alert-danger m-2">
                Errore titolo: {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Aggiunta del tipo --}}
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
            placeholder="Inserisci il tipo di fumetto">

        {{-- In caso di errore del tipo --}}
        @error('type')
            <div class="alert alert-danger mt-1">
                Errore tipo: {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Aggiunta della serie --}}
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
            placeholder="Inserisci la serie del fumetto">



        {{-- In caso di errore nella serie --}}
        @error('series')
            <div class="alert alert-danger mt-1">
                Errore serie: {{ $message }}
            </div>
        @enderror
    </div>


     {{-- Aggiunta Prezzo --}}

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
            placeholder="Scrivi il prezzo">
        </textarea>

        {{-- In caso di errore nella Prezzo --}}
        @error('price')
            <div class="alert alert-danger my-4">
                Errore Prezzo: {{ $message}}
            </div>
        @enderror
    </div>

    {{-- Aggiunta descrizione --}}

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
            placeholder="Scrivi la descrizione...">
        </textarea>

        {{-- In caso di errore nella descrizione --}}
        @error('description')
            <div class="alert alert-danger my-4">
                Errore descrizione: {{ $message}}
            </div>
        @enderror
    </div>

    {{-- Bottone per aggiungere il fumetto creato --}}

    <div>
        <button type="submit" class="btn btn-success w-100">
            + Aggiungi
        </button>
    </div>
</form>