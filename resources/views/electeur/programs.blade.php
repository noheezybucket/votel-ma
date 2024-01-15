@extends('base')

@section('title', 'Programmes')


@section('content')
    @include('components.electeur-menu')
    <div class="container">
        <div class="bg-light text-primary my-2 rounded-3 py-3">

            <h3 class="text-center">Liste des programmes</h3>
        </div>

        @if (count($programs) > 0)


            @foreach ($programs as $program)
                <div class="card mb-3" style="">
                    <div class="row no-gutters">
                        <div class="">
                            <div class="card-body">
                                <img src="{{ asset('/uploads/images/' . $program->candidat->photo) }}" alt=""
                                    width="50px" height="200px" class="card-img object-fit-cover mb-2">
                                <h5 class="card-title">{{ $program->titre }}</h5>
                                <h6 class="card-text">{{ $program->candidat->nom }} {{ $program->candidat->prenom }}</h6>
                                <p class="card-text text-justify">{{ substr($program->contenu, 0, 300) }}...</p>
                                <a href="{{ asset('/upload/documents/' . $program->document) }}"></a>
                                <div>

                                    <a href="{{ route('electeur.view-program', ['id' => $program->id]) }}"
                                        class="btn btn-primary">Détails</a>
                                </div>
                                <p class="card-text"><small class="text-muted">{{ $program->updatedAt }} </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h5 class="text-center w-100">Aucun programme n'a été trouvé</h5>
        @endif
    </div>

@endsection
@include('../scripts/electeur')
