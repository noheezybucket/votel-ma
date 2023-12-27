@extends('base')

@section('title', 'Candidate')

@section('content')

    @if (session('status'))
        <div class="class alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div id="toolbar" class="border w-full">
        <a class=" btn btn-primary mb-2 align-items-center d-flex gap-1" style="width:fit-content;"
            href="{{ url('candidate/create') }}"><x-far-square-plus style="width:20px" /> Nouveau
            candidat</a>
    </div>
    <div class="table-responsive">

        <table id=candidate-table class="table table-striped table-hover border caption-top" data-toggle='table'
            data-pagination="true" data-search-align="right" data-search="true" data-toolbar="#toolbar" data-locale="fr-FR">

            <thead align="left">
                <th data-field="photo"></th>
                <th data-field="id" data-sortable="true">#</th>
                <th data-field="prenom" data-sortable='true'>Prenom</th>
                <th data-field="nom" data-search="true">Nom</th>
                <th data-field="partie" data-sortable="true">Partie</th>
                <th data-field="biographie">Biographie</th>
                <th data-field="buttons" width="20%" class="py-2">Actions</th>
            </thead>
            <tbody></tbody>
            <tfoot></tfoot>
        </table>

    </div>

    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('../scripts/candidate')
