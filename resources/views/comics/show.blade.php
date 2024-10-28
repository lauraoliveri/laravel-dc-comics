@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')

<div class="d-flex justify-content-between align-items-end mb-4">
    <h1>
        {{ $comic->title }}
    </h1>

    <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning">
        Modifica
    </a>
</div>

<div class="card">
    <div class="card-body">

        {{-- Immagine del fumetto --}}

        <img src="{{ $pasta-thumb }}" class="card-img-top" alt="{{ $comic->title }}">

        {{-- Info generali --}}
        <ul>
            <li>
                Tipo: {{ $comic->type }}
            </li>
            <li>
                Serie: {{ $comic->series }} 
            </li>
            <li>
                Prezzo: {{ $comic->weight }} £
            </li>
        </ul>

        {{-- Descrizione del fumetto --}}
        <p>
            {!! $comic->description !!}
            <hr>
            {{ $comic->description }}
        </p>
    </div>
</div>

@endsection