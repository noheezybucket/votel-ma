@extends('base')

@section('title', 'Détails programme')


@section('content')
    @include('components.electeur-menu')
    <div class="container">
        <div>
            <div class="d-flex justify-content-center">

                <img src="{{ asset('/uploads/images/' . $programme->candidat['photo']) }}" width="150px" height="150px"
                    class="object-fit-cover rounded-circle" alt="">
            </div>

            <div>
                <h2 class="text-center">
                    {{ $programme->candidat['prenom'] }}
                    {{ $programme->candidat['nom'] }}

                </h2>

            </div>

        </div>

        <h2 class="text-center">
            Titre - {{ $programme->titre }}

        </h2>
        <p>
            {{ $programme->contenu }}
        <div class="mb-3">
            </p>


            <a class="btn btn-primary " href="{{ asset('/uploads/documents/' . $programme->document) }}">J'aime
                <x-far-thumbs-up style="width:20px" /></a>
            <a class="btn btn-danger " href="{{ asset('/uploads/documents/' . $programme->document) }}">Je n'aime pas
                <x-far-thumbs-down style="width:20px" /></a>
        </div>

    </div>

@endsection
@include('../scripts/electeur')
