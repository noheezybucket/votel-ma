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

            <span class="{{ $likes ? 'btn btn-primary' : 'btn btn-outline-primary' }}" title="likes" id="like-button"
                data-type="like" data-program="{{ $programme->id }}">
                <span id="likes"></span>

                J'aime
                <x-far-thumbs-up style="width:20px" />
            </span>
            <span class="{{ $dislikes ? 'btn btn-danger' : 'btn btn-outline-danger' }}" title="dislikes" id="dislike-button"
                data-type="dislike" data-program="{{ $programme->id }}">
                <span id="dislikes"></span>

                Je n'aime pas
                <x-far-thumbs-down style="width:20px" />
            </span>
        </div>

    </div>

@endsection
@include('../scripts/electeur')
