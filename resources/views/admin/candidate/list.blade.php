@extends('base')

@section('title', 'Liste des candidats')

@section('sidebar')
    @include('components.admin-sidebar')
@endsection

@section('content')

    @if (session('status'))
        <div class="class alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="p-2">
        <div
            class="mb-2 d-flex align-items-center bg-light text-primary rounded-3 p-3 justify-content-between container-sm mx-auto">
            <h4 class="m-0">Candidats
            </h4>
            <img src="{{ asset('/img/senegal.svg') }}" alt="" width="40px" class="rounded-3">
        </div>

        <div id="toolbar" class="">
            <a class=" btn btn-outline-light  align-items-center d-flex gap-1" style="width:fit-content;"
                href="{{ route('admin.create-candidate') }}"> Nouveau
                candidat <x-fas-plus style="width:20px" /></a>
        </div>
        <div class="table-responsive mx-auto bg-primary rounded-3 px-2 pb-2 container">
            <div class="rounded-3 overflow-hidden">

                <table id=candidate-table class="table table-striped table-hover border" data-toggle='table'
                    data-pagination="false" data-search-align="right" data-search="true" data-toolbar="#toolbar"
                    data-locale="fr-FR">

                    <thead align="center">
                        <th data-field="id" data-sortable="true">#</th>
                        <th data-field="photo">Candidat</th>
                        <th data-field="prenom" data-sortable='true'>Prenom</th>
                        <th data-field="nom" data-search="true">Nom</th>
                        <th data-field="partie" data-sortable="true">Partie</th>
                        <th data-field="biographie">Biographie</th>
                        <th data-field="maj" data-sortable="true" data-switchable-label="true">Création/Modification</th>
                        <th data-field="buttons">Boutons</th>
                    </thead>
                    <tbody id="candidate-table-body" align="center"></tbody>
                    <tfoot></tfoot>
                </table>
            </div>

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
                        <div class="w-100 d-flex justify-content-center">
                            <img src="" alt="" id="photo"
                                style=" width:250px; height:250px; display:block" class="rounded-circle object-fit-cover">
                        </div>
                        <div class="d-flex w-100 gap-3">
                            <form class="w-100">
                                <div class="mb-3">
                                    <label for="prenom" class="col-form-label">Prenom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nom" class="col-form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="partie" class="col-form-label">Partie</label>
                                    <input type="text" class="form-control" id="partie" name="partie" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="valider" class="col-form-label">Validation</label>
                                    <input type="text" class="form-control" id="valider" name="valider" disabled>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Modification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="w-100 d-flex justify-content-center">

                            <img src="" alt="" id="update-photo"
                                style=" width:250px; height:250px; display:block" class="rounded-circle object-fit-cover">
                        </div>
                        <div class="d-flex w-100 gap-3  ">

                            <form id="update-candidat" class="w-100" enctype="multipart/form-data">
                                @csrf
                                <div id="update-error"></div>
                                <input type="hidden" name="update-id" id="update-id">
                                <div class="mb-3">
                                    <label for="update-prenom" class="col-form-label">Prenom</label>
                                    <input type="text" class="form-control" id="update-prenom" name="prenom">
                                </div>
                                <div class="mb-3">
                                    <label for="update-nom" class="col-form-label">Nom</label>
                                    <input type="text" class="form-control" id="update-nom" name="nom">
                                </div>
                                <div class="mb-3">
                                    <label for="update-partie" class="col-form-label">Partie</label>
                                    <input type="text" class="form-control" id="update-partie" name="partie">
                                </div>
                                <div>
                                    <label for="update-biographie" class="col-form-label">Biographie</label>
                                    <textarea class="form-control" id="update-biographie" rows="10"></textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="update-photo" class="form-label">Photo</label>
                                    <input type="file" id="update-photo" name="update-photo" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" id="update-candidate-btn" class="btn btn-warning">Sauvegarder</button>
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
                        <p>Voulez-vous réelement supprimer ce candidate? Notez que cette action est irréversible. </p>
                        <form>
                            @csrf
                            <input type="hidden" name="delete-id" id="delete-id" class="delete-id">
                        </form>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                        <button type="button" id="delete-candidate-btn" class="btn btn-danger">Oui</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@include('../scripts/candidate')
