@extends('base')

@section('title', 'Liste des programmes')

@section('content')
    <div id="toolbar" class="">
        <a class=" btn btn-primary mb-2 align-items-center d-flex gap-1" style="width:fit-content;"
            href="{{ route('admin.create-program') }}"> Nouveau
            programme <x-fas-plus style="width:20px" /></a>
    </div>
    <div class="table-responsive mx-auto">

        <table id=program-table class="table table-striped table-hover border caption-top" data-toggle='table'
            data-pagination="true" data-search-align="right" data-search="true" data-toolbar="#toolbar" data-locale="fr-FR">

            <thead align="left">
                <th data-field="candidat">Candidat</th>
                <th data-field="id" data-sortable="true">#</th>
                <th data-field="titre" data-sortable='true'>Titre</th>
                <th data-field="contenu" data-sortable='true'>Contenu</th>
                <th data-field="document" data-sortable='true'>Document</th>
                <th data-field="buttons" width="20%"></th>
            </thead>
            <tbody id="program-table-body"></tbody>
            <tfoot></tfoot>
        </table>
    </div>

    {{-- View Modal --}}
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Vue détaillée</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="w-100">
                        <div class="mb-3">
                            <div id="document"></div>
                        </div>
                        <div class="mb-3">
                            <label for="titre" class="col-form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" disabled>
                        </div>
                        <div>
                            <label for="contenu" class="col-form-label">Contenu</label>
                            <textarea class="form-control" id="contenu" rows="10" disabled></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Update View --}}
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Modification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex w-100 gap-3  ">
                        <form class="w-100" id="update-program" enctype="multipart/form-data">
                            <div id="update-error">
                            </div>
                            <div id="update-success">
                            </div>
                            @csrf
                            <form class="w-100">
                                <div class="mb-3">
                                    <div id="document"></div>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="update-id" id="update-id">
                                    <label for="update-titre" class="col-form-label">Titre</label>
                                    <input type="text" class="form-control" id="update-titre" name="update-titre">
                                </div>
                                <div>
                                    <label for="update-contenu" class="col-form-label">Contenu</label>
                                    <textarea class="form-control" id="update-contenu" name="update-contenu" rows="10"></textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="update-document" class="form-label">Document</label>
                                    <input type="file" id="update-document" name="update-document"
                                        class="form-control">
                                </div>
                            </form>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" id="update-program-btn" class="btn btn-warning">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete View --}}
    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Etes vous sûr ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p>Voulez-vous réelement supprimer ce programme? Notez que cette action est irréversible. </p>
                    <form>
                        @csrf
                        <input type="hidden" name="delete-id" id="delete-id" class="delete-id">
                    </form>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                    <button type="button" id="delete-program-btn" class="btn btn-danger">Oui</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('../scripts/program')
