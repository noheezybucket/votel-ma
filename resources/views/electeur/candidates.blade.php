@extends('base')

@section('title', 'Liste des candidats')

@section('content')
    @include('components.electeur-menu')
    <div>

    </div>
    <div class=" container">
        @foreach ($candidats as $candidat)
            <div class="card mb-3" style="">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('/uploads/images/' . $candidat->photo) }}" class="card-img object-fit-cover"
                            width="200px" height="200px" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidat->prenom }} {{ $candidat->nom }}</h5>
                            <p class="card-text text-justify">{{ substr($candidat->biographie, 0, 150) }}...</p>
                            <div><a href="{{ route('electeur.view-candidate', ['id' => $candidat->id]) }}"
                                    class="btn btn-primary">Voir
                                    plus de
                                    détail</a></div>
                            <p class="card-text"><small class="text-muted">{{ $candidat->updatedAt }} </small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
