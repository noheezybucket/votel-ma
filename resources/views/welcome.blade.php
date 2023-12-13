@extends('base')
@section('title', 'Accueil')

@section('content')
    <main style='height:80vh' class=" d-flex align-items-center justify-content-center flex-column">
        <h1>Bienvenue dans Parrainage App</h1>
        <p>Parrainez votre candidat en quelques clics !</p>

        <div class="mb-2">
            <a class=" btn btn-primary" href="{{ url('apprenants') }}">Voir la liste des candidats</a>
            <a class=" btn btn-primary" href="{{ url('formations') }}">Voir la liste des programmes</a>
        </div>
    </main>

@endsection
