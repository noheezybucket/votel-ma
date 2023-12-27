@extends('base')

@section('title', 'Ajouter un candidats')

@section('content')

    <div class=" my-3 d-flex align-items-center justify-content-between gap-3 w-50 mx-auto">
        <h2>Nouveau candidat</h2>
        <a class="btn btn-danger" href="{{ url('candidats/list') }}">Retour</a>
    </div>

    @if (session('status'))
        <div class="class alert alert-success w-50 mx-auto">
            {{ session('status') }}
        </div>
    @endif


    <ul class="list-unstyled w-50 mx-auto">
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger ">{{ $error }}</li>
        @endforeach
    </ul>

    <form action="/candidats/create/processing" method="POST" class="w-50 mx-auto row ">
        @csrf
        <div class="form-group col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="partie" class="form-label">Partie</label>
            <input type="text" id="partie" name="partie" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="biographie" class="form-label">Biographie</label>
            <textarea type="text" id="biographie" name="biographie" class="form-control"></textarea>
        </div>
        <input type="hidden" name="validate" value="{{ 1 }}">
        <div class="form-group mt-2">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" id="photo" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="Créer le candidat" class="btn btn-primary w-100 mt-3">
        </div>
    </form>


@endsection
