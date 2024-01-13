@extends('base')

@section('title', 'Programme')

@section('content')
    <div class="container">
        <div>
            <div>

                <img src="{{ asset('/uploads/images/' . $programme->candidat['photo']) }}" width="150px" height="150px"
                    class="object-fit-cover rounded-circle" alt="">
            </div>

            <div>
                <h2>
                    {{ $programme->candidat['prenom'] }}
                    {{ $programme->candidat['nom'] }}

                </h2>

            </div>

        </div>

        <h2>
            Détails du programme : {{ $programme->titre }}

        </h2>
        <p>
            {{ $programme->contenu }}

        </p>
        <a class="btn btn-primary " href="{{ asset('/uploads/document' . $programme->document) }}">Télécharger le document</a>

    </div>

@endsection
