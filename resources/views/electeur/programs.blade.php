@extends('base')

@section('title', 'Programmes')


@section('content')
    @include('components.electeur-menu')
    <div class="container">

        <hr>
        <h3 class="text-center">Liste des programmes</h3>
        <hr>
        @foreach ($programs as $program)
            <div class="card mb-3" style="">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $program->titre }}</h5>
                            <p class="card-text text-justify">{{ substr($program->contenu, 0, 150) }}...</p>
                            <a href="{{ asset('/upload/documents/' . $program->document) }}"></a>
                            <div><a href="{{ route('electeur.view-program', ['id' => $program->id]) }}"
                                    class="btn btn-primary">Voir
                                    plus de
                                    détail</a></div>
                            <p class="card-text"><small class="text-muted">{{ $program->updatedAt }} </small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
