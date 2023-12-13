@extends('base')

@section('title', 'Ajouter un candidats')

@section('content')


    <div class="mt-5">
        <h2 class="text-center">Ajouter un candidat</h2>
    </div>

    <form action="" class="w-50 mx-auto">
        <div class="form-group">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" id="nom" class="form-control">
        </div>
        <div class="form-group">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" id="prenom" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Créer le candidat" class="btn btn-primary w-100 mt-3">
        </div>
    </form>


@endsection
