@extends('base')

@section('title', 'Gestion des secteurs')

@section('content')
    <div id="toolbar" class="">
        <a class=" btn btn-primary mb-2 align-items-center d-flex gap-1" style="width:fit-content;"
            href="{{ route('admin.create-secteur') }}"> Nouveau
            secteur <x-fas-plus style="width:20px" /></a>
    </div>
    <div class="table-responsive mx-auto">

        <table id=secteur-table class="table table-striped table-hover border caption-top" data-toggle='table'
            data-pagination="true" data-search-align="right" data-search="true" data-toolbar="#toolbar" data-locale="fr-FR">

            <thead align="left">
                <th data-field="id" data-sortable="true">#</th>
                <th data-field="label" data-sortable='true'>Label</th>
                <th data-field="couleur" data-sortable='true'>Couleur</th>
                {{-- <th data-field="icon" data-sortable='true'>Icône</th> --}}
                <th data-field="buttons" width="20%"></th>
            </thead>
            <tbody></tbody>
            <tfoot></tfoot>
        </table>
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
                    <p>Voulez-vous réelement supprimer ce secteur? Notez que cette action est irréversible. </p>
                    <form>
                        @csrf
                        <input type="hidden" name="delete-id" id="delete-id">
                    </form>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                    <button type="button" id="delete-secteur-btn" class="btn btn-danger">Oui</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('../scripts/secteur')
