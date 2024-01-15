@extends('base')

@section('title', 'Programmes')


@section('content')
    @include('components.electeur-menu')
    <div class="container">
        <div class="bg-light text-primary my-2 rounded-3 py-3">

            <h3 class="text-center">Liste des programmes</h3>
        </div>
        @foreach ($programs as $program)
            <div class="card mb-3" style="">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $program->titre }}</h5>
                            <p class="card-text text-justify">{{ substr($program->contenu, 0, 300) }}...</p>
                            <a href="{{ asset('/upload/documents/' . $program->document) }}"></a>
                            <div>
                                <a class="btn btn-primary "
                                    href="{{ asset('/uploads/documents/' . $program->document) }}">J'aime
                                    <x-far-thumbs-up style="width:20px" /></a>
                                <a class="btn btn-danger " href="{{ asset('/uploads/documents/' . $program->document) }}">Je
                                    n'aime pas
                                    <x-far-thumbs-down style="width:20px" /></a>
                                <a href="{{ route('electeur.view-program', ['id' => $program->id]) }}"
                                    class="btn btn-primary">Détails</a>
                            </div>
                            <p class="card-text"><small class="text-muted">{{ $program->updatedAt }} </small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
@include('../scripts/electeur')
