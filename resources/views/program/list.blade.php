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
                            <label for="titre" class="col-form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" disabled>
                        </div>
                        <div>
                            <label for="contenu" class="col-form-label">Contenu</label>
                            <textarea class="form-control" id="contenu" rows="10" disabled></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="document" class="col-form-label">Document</label>
                            <input type="text" class="form-control" id="document" name="document" disabled>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('../scripts/program')
