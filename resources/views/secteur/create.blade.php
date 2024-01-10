@extends('base')

@section('title', 'Ajouter un secteur')

@section('content')
    <div class=" my-3 d-flex align-items-center justify-content-between gap-3 w-50 mx-auto">
        <h2>Nouveau secteur</h2>
        <a class="btn btn-danger" href="{{ route('admin.list-secteurs') }}">Retour</a>
    </div>

    <form id="create-secteur" class="w-50 mx-auto row">
        <div id="error">
        </div>
        <div id="success">
        </div>
        @csrf
        <div class="form-group mb-2">
            <label for="label" class="form-label">Label</label>
            <select id="label" class="form-select" aria-label="Default select example">
                <option value="1">Santé</option>
                <option value="2">Sport</option>
                <option value="3">Education</option>
                <option value="4">Agriculture</option>
            </select>
        </div>

        <div class="form-group mb-2">
            <label for="couleur" class="form-label">Couleur</label>
            <select id="couleur" class="form-select" aria-label="Default select example">
                <option value="1">primary</option>
                <option value="2">warning</option>
                <option value="3">info</option>
                <option value="4">red</option>
            </select>
        </div>

        {{-- <div class="form-group">
            <label for="icon" class="form-label">Icône</label>
            <input type="text" id="icon" name="icon" class="form-control">
        </div> --}}

        <div class="form-group">
            <button type="button" id="create-secteur-btn"
                class="btn btn-primary w-100 mt-3 align-items-center d-flex gap-1 justify-content-center">
                Créer le secteur
                <x-fas-plus style="width:20px" />
            </button>
        </div>
    </form>
@endsection

@include('../scripts/secteur')
