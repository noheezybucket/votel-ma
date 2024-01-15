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

            <span class="btn btn-outline-primary like-button" title="likes" id="saveLikeDislike" data-type="like"
                data-program="{{ $programme->id }}">
                @if ($likes !== 0)
                    {{ $likes }}
                @endif

                J'aime
                <x-far-thumbs-up style="width:20px" />
            </span>
            <span class="btn btn-outline-danger dislike-button" title="dislikes" id="saveLikeDislike" data-type="dislike"
                data-program="{{ $programme->id }}">
                @if ($dislikes !== 0)
                    {{ $dislikes }}
                @endif

                Je n'aime pas
                <x-far-thumbs-down style="width:20px" />
            </span>
        </div>

    </div>

@endsection
@include('../scripts/electeur')
