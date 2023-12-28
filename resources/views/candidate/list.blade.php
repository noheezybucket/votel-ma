@extends('base')

@section('title', 'Liste des candidats')

@section('content')

    @if (session('status'))
        <div class="class alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div id="toolbar" class="">
        <a class=" btn btn-primary mb-2 align-items-center d-flex gap-1" style="width:fit-content;"
            href="{{ route('admin.create-candidate') }}"><x-far-square-plus style="width:20px" /> Nouveau
            candidat</a>
    </div>
    <div class="table-responsive mx-auto">

        <table id=candidate-table class="table table-striped table-hover border caption-top" data-toggle='table'
            data-pagination="true" data-search-align="right" data-search="true" data-toolbar="#toolbar" data-locale="fr-FR">

            <thead align="left">
                <th data-field="photo">Candidat</th>
                <th data-field="id" data-sortable="true">#</th>
                <th data-field="prenom" data-sortable='true'>Prenom</th>
                <th data-field="nom" data-search="true">Nom</th>
                <th data-field="partie" data-sortable="true">Partie</th>
                <th data-field="biographie">Biographie</th>
                <th data-field="buttons" width="20%" class="py-2">Actions</th>
            </thead>
            <tbody id="candidate-table-body"></tbody>
            <tfoot></tfoot>
        </table>

    </div>


    {{-- View Modal --}}
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Vue détaillée</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex w-100 gap-3  ">

                        <div class="w-100">
                            <img src="" alt="" id="photo"
                                style="max-height:100px max-width:120px; width:100%; height:100%; object-fit:cover"
                                class="rounded object-fit-cover">
                        </div>
                        <form class="w-100">
                            <div class="mb-3">
                                <label for="prenom" class="col-form-label">Prenom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="col-form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" disabled>
                            </div>
                            <div>
                                <label for="biographie" class="col-form-label">Biographie</label>
                                <textarea class="form-control" id="biographie" rows="10" disabled></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Update View --}}
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Modifier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex w-100 gap-3  ">

                        <div class="w-25">
                            <img src="" alt="" id="photo"
                                style="max-height:100px max-width:120px; width:100%; height:100%; object-fit:cover"
                                class="rounded object-fit-cover">
                        </div>
                        <form class="w-100">
                            <div class="mb-3">
                                <label for="prenom" class="col-form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="col-form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" disabled>
                            </div>
                            <div>
                                <label for="biographie" class="col-form-label">Biographie</label>
                                <textarea class="form-control" id="biographie" rows="10" disabled></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Send message</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@include('../scripts/candidate')
