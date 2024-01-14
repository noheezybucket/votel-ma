@extends('base')

@section('title', 'Ajouter un programme')

@section('sidebar')
    @include('components.admin-sidebar')
@endsection

@section('content')
    <div class="p-2">

        <div
            class="mb-2 d-flex align-items-center bg-light text-primary rounded-3 p-3 justify-content-between container-sm mx-auto p-0">
            <h4>Nouveau programme</h4>
            <a class="btn btn-danger" href="{{ route('admin.list-programs') }}">Retour</a>
        </div>

        <form id="create-program" class="w-50 bg-primary text-white mx-auto row py-3 rounded-3" enctype="multipart/form-data">
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
                <label for="candidat_id" class="form-label">Candidat</label>
                <select id="candidat_id" name="candidat_id" class="form-select" aria-label="Default select example">
                    <option selected>Selectionnez un candidat</option>
                    @foreach ($candidats as $candidat)
                        <option value="{{ $candidat->id }}">{{ $candidat->id }}. {{ $candidat->prenom }}
                            {{ $candidat->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-2">
                <label for="secteur_id" class="form-label">Secteur</label>
                <select id="secteur_id" name="secteur_id" class="form-select" aria-label="Default select example">
                    <option selected>Selectionnez un secteur</option>
                    @foreach ($secteurs as $secteur)
                        <option value="{{ $secteur->id }}">{{ $secteur->id }}. {{ $secteur->label }}
                        </option>
                    @endforeach
                </select>
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
                    class="btn btn-outline-light w-100 mt-3 align-items-center d-flex gap-1 justify-content-center">
                    Créer le programme
                    <x-fas-plus style="width:20px" />
                </button>
            </div>
        </form>
    </div>

@endsection

@include('../scripts/program')
