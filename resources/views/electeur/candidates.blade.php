@extends('base')

@section('title', 'Liste des candidats')

@section('content')
    @include('components.electeur-menu')
    <div class="bg-light text-primary my-2 rounded-3 py-3 container">

        <h3 class="text-center">Liste des candidats</h3>
    </div>
    <div class="container row row-cols-3 mx-auto mt-3">
        @if (count($candidats) > 0)

            @foreach ($candidats as $candidat)
                <div class="col mb-4">
                    <div class="card">
                        <img src="{{ asset('/uploads/images/' . $candidat->photo) }}" class="card-img object-fit-cover"
                            width="200px" height="200px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidat->prenom }} {{ $candidat->nom }}</h5>
                            <p class="card-text">{{ $candidat->partie }}</p>
                            <div><a href="{{ route('electeur.view-candidate', ['id' => $candidat->id]) }}"
                                    class="btn btn-primary">Détails</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h5 class="text-center w-100">Aucun candidat n'a été trouvé</h5>
        @endif

    </div>
@endsection
@include('../scripts/electeur')
