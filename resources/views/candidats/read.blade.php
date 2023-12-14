@extends('base')

@section('title', $candidat->nom . ' ' . $candidat->prenom)

@section('content')

    <div class="w-75 mx-auto">
        <a href="/candidats/list" class=" btn btn-primary mb-2">Retour à la liste des candidats</a>
    </div>
    <div class="d-flex gap-3 rounded border w-75 mx-auto">
        <div class="w-50">
            <img src="/img/{{ $candidat->photo }}.jpg" alt="" style="width:100%; height:100%; object-fit:cover"
                class="rounded object-fit-cover">
        </div>
        <div class="w-50">
            <h1>{{ $candidat->nom }} {{ $candidat->prenom }}</h1>
            <h4>{{ $candidat->partie }}</h4>
            <h4>Biographie</h4>
            <p>{{ $candidat->biographie }}</p>
        </div>
    </div>

@endsection
