@extends('base')

@section('title', 'Ajouter un programme')

@section('content')
    <div class=" my-3 d-flex align-items-center justify-content-between gap-3 w-50 mx-auto">
        <h2>Nouveau programme</h2>
        <a class="btn btn-danger" href="{{ route('admin.list-programs') }}">Retour</a>
    </div>

    <form id="create-program" class="w-50 mx-auto row" enctype="multipart/form-data">
        <div id="error">
        </div>
        <div id="success">
        </div>
        @csrf
        <div class="form-group">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" id="titre" name="titre" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea type="text" id="contenu" name="contenu" class="form-control"></textarea>
        </div>
        <div class="form-group mt-2">
            <label for="document" class="form-label">Document</label>
            <input type="file" id="document" name="document" class="form-control">
        </div>
        <div class="form-group">
            <button type="button" id="create-program-btn"
                class="btn btn-primary w-100 mt-3 align-items-center d-flex gap-1 justify-content-center">
                Créer le programme
                <x-fas-plus style="width:20px" />
            </button>
        </div>
    </form>
@endsection

@include('../scripts/program')
