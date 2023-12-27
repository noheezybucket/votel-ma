@extends('base')

@section('title', $candidat->nom . ' ' . $candidat->prenom)

@section('content')

    <div class="w-75 mx-auto d-flex gap-2">
        <a href="/candidats/list" class=" btn btn-primary mb-2 align-items-center d-flex gap-1" style="width:fit-content;">
            <x-far-square-caret-left style="width:20px" />Annuler </a>
        <form action="/candidats/delete/processing" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $candidat->id }}">
            <button type="submit" class=" btn btn-danger mb-2 align-items-center d-flex gap-1" style="width:fit-content;">
                <x-far-trash-can style="width:20px" />Supprimer </button>
        </form>
    </div>
    <div class="d-flex gap-3 rounded border w-75 mx-auto">
        <div class="w-50">
            <img src="/img/{{ $candidat->photo }}.jpg" alt=""
                style="max-height:500px ;width:100%; height:100%; object-fit:cover" class="rounded object-fit-cover">
        </div>
        <div class="w-50">
            <h1>{{ $candidat->nom }} {{ $candidat->prenom }}</h1>
            <h4>{{ $candidat->partie }}</h4>
            <h4>Biographie</h4>
            <p>{{ $candidat->biographie }}</p>
            <input type="hidden" name="{{ $candidat->id }}">
        </div>
    </div>

@endsection
