@extends('base')

@section('title', 'Liste des programmes')

@section('sidebar')
    @include('components.admin-sidebar')
@endsection

@section('content')
    <div class="p-2">
        <div
            class="mb-2 d-flex align-items-center bg-light text-primary rounded-3 p-3 justify-content-between container-sm mx-auto">
            <h4 class="m-0">Programmes
            </h4>
            <img src="{{ asset('/img/senegal.svg') }}" alt="" width="40px" class="rounded-3">
        </div>
        <div id="toolbar" class="">
            <a class=" btn btn-outline-light mb-2 align-items-center d-flex gap-1" style="width:fit-content;"
                href="{{ route('admin.create-program') }}"> Nouveau
                programme <x-fas-plus style="width:20px" /></a>
        </div>
        <div class="table-responsive mx-auto bg-primary rounded-3 px-2 pb-2 container">
            <div class="rounded-3 overflow-hidden">
                <table id=program-table class="table table-striped table-hover border caption-top" data-toggle='table'
                    data-pagination="false" data-search-align="right" data-search="true" data-toolbar="#toolbar"
                    data-locale="fr-FR">

                    <thead align="center">
                        <th data-field="id" data-sortable="true">#</th>
                        <th data-field="candidat">Candidat</th>
                        <th data-field="nom" data-sortable="true">Nom & Prenom</th>
                        <th data-field="titre" data-sortable='true'>Titre</th>
                        <th data-field="secteur" data-sortable='true'>Secteur</th>
                        {{-- <th data-field="contenu" data-sortable='true'>Contenu</th> --}}
                        <th data-field="document">Document</th>
                        <th data-field="maj" data-sortable='true'>Création/Modification</th>
                        <th data-field="buttons">Boutons</th>
                    </thead>
                    <tbody id="program-table-body" align="center"></tbody>
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
                        <div class="w-100 d-flex justify-content-center align-items-center flex-column gap-3">
                            <img src="" alt="" id="photo"
                                style=" width:250px; height:250px; display:block" class="rounded-circle object-fit-cover">
                            <div class="mb-3 d-flex gap-3">
                                <div id="document"></div>
                                <div id="secteur"></div>
                            </div>
                        </div>
                        <form class="w-100">

                            <div class="mb-3">
                                <label for="candidat" class="col-form-label">Candidat</label>
                                <input type="text" class="form-control" id="candidat" name="candidat" disabled>
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
                        <div class="w-100 d-flex justify-content-center align-items-center flex-column gap-3">
                            <img src="" alt="" id="update-photo"
                                style=" width:250px; height:250px; display:block" class="rounded-circle object-fit-cover">
                        </div>
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
                                        <input type="text" class="form-control" id="update-titre"
                                            name="update-titre">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="update-candidat" class="form-label">Candidat</label>
                                        <select id="update-candidat" name="update-candidat" class="form-select"
                                            aria-label="Default select example">


                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="update-secteur" class="form-label">Secteur</label>
                                        <select id="update-secteur" name="update-secteur" class="form-select"
                                            aria-label="Default select example">
                                            <option selected>Assigner un nouveau secteur</option>


                                        </select>
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
    </div>

@endsection
@include('../scripts/program')
