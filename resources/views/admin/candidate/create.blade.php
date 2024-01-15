@extends('base')

@section('title', 'Ajouter un candidats')

@section('sidebar')
    @include('components.admin-sidebar')
@endsection

@section('content')

    <div class="p-2">

        <div
            class="mb-2 d-flex align-items-center bg-light text-primary rounded-3 p-3 justify-content-between container-sm mx-auto p-0">
            <h4>Nouveau candidat</h4>
            <a class="btn btn-danger" href="{{ route('admin.list-candidate') }}">Retour</a>
        </div>

        <form id="create-candidate" class="w-50 mx-auto row bg-primary text-white rounded-3 py-4"
            enctype="multipart/form-data">
            <div id="error">
            </div>
            <div id="success">
            </div>
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
            <input type="hidden" name="validate" id='validate' name="validate" value="{{ 0 }}">
            <div class="form-group mt-2">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" id="photo" name="photo" class="form-control">
            </div>
            <div class="form-group">
                <button type="button" id="create-candidate-btn"
                    class="btn btn-outline-light w-100 mt-3 align-items-center d-flex gap-1 justify-content-center">
                    Créer le candidat
                    <x-fas-plus style="width:20px" />
                </button>
            </div>
        </form>
    </div>


@endsection
@include('../scripts/candidate')