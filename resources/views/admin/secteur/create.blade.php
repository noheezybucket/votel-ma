@extends('base')

@section('title', 'Ajouter un secteur')

@section('sidebar')
    @include('components.admin-sidebar')
@endsection

@section('content')
    <div class="p-2">

        <div class="mb-2 d-flex align-items-center bg-light rounded-3 p-3 justify-content-between container-sm mx-auto p-0">
            <h2>Nouveau secteur</h2>
            <a class="btn btn-danger" href="{{ route('admin.list-secteurs') }}">Retour</a>
        </div>

        <form id="create-secteur" class="mx-auto w-50 row bg-primary container py-3 rounded-3 text-white">
            <div id="error">
            </div>
            <div id="success">
            </div>
            @csrf
            <div class="form-group mb-2">
                <label for="label" class="form-label">Label</label>
                <select id="label" class="form-select" aria-label="Default select example">
                    <option selected>Sélectionnez un label</option>
                    <option value="1">Santé</option>
                    <option value="2">Sport</option>
                    <option value="3">Education</option>
                    <option value="4">Agriculture</option>
                </select>
            </div>

            <div class="form-group mb-2">
                <label for="couleur" class="form-label">Couleur</label>
                <select id="couleur" class="form-select" aria-label="Default select example">
                    <option selected>Sélectionnez une couleur</option>
                    <option value="1">primary</option>
                    <option value="2">warning</option>
                    <option value="3">info</option>
                    <option value="4">danger</option>
                </select>
            </div>

            {{-- <div class="form-group">
            <label for="icon" class="form-label">Icône</label>
            <input type="text" id="icon" name="icon" class="form-control">
        </div> --}}

            <div class="form-group">
                <button type="button" id="create-secteur-btn"
                    class="btn btn-outline-light w-100 mt-3 align-items-center d-flex gap-1 justify-content-center">
                    Créer le secteur
                    <x-fas-plus style="width:20px" />
                </button>
            </div>
        </form>
    </div>

@endsection

@include('../scripts/secteur')
