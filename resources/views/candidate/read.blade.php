@extends('base')

@section('title', $candidat->nom . ' ' . $candidat->prenom)

@section('content')

    <div class="w-75 mx-auto d-flex ">

        <a href="/candidats/list" class=" btn btn-primary mb-2 align-items-center d-flex gap-1" style="width:fit-content;">
            <x-far-square-caret-left style="width:20px" />Retour vers la liste des candidats</a>
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
            <p>{{ nl2br($candidat->biographie) }}</p>
        </div>
    </div>

@endsection
