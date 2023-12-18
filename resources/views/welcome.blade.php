@extends('base')
@section('title', 'Accueil')

@section('content')
    <main style='height:80vh' class=" d-flex align-items-center justify-content-center flex-column">
        <h1>Bienvenue dans ParrainApp</h1>
        <p>L'app qui vous permet de parrainez votre candidat en quelques clics !</p>

        <div class="mb-2">
            <a class=" btn btn-primary" href="{{ url('candidats/list') }}">Se connecter</a>
            <a class=" btn btn-primary" href="{{ url('formations') }}">S'inscrire</a>
        </div>
    </main>

@endsection
