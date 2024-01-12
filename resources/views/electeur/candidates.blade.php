@extends('base')

@section('title', 'Liste des candidats')

@section('content')
    <div class="d-flex justify-content-between container">
        @foreach ($candidats as $candidat)
            <div class="card" style="width: 20rem;">
                <img src="{{ asset('/uploads/images/' . $candidat->photo) }}" class="card-img-top object-fit-cover"
                    alt="..." height="250px">
                <div class="card-body">
                    <div class="my-3">
                        <span class="rounded-1 bg-info text-white p-1">Santé</span>
                        <span class="rounded-1 bg-primary text-white p-1">Agriculture</span>
                        <span class="rounded-1 bg-danger text-white p-1">Pêche</span>

                    </div>
                    <h5 class="card-title">{{ $candidat->prenom }} {{ $candidat->nom }}</h5>
                    <p class="card-text">{{ $candidat->biographie }}</p>
                    <a href="{{ route('electeur.view-candidate', ['id' => $candidat->id]) }}" class="btn btn-primary">Voir
                        plus de
                        détail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
