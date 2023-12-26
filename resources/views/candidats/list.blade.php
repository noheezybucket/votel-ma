@extends('base')

@section('title', 'Candidats')

@section('content')


    <div class=" mt-3 d-flex align-items-center justify-content-between gap-3">
        <h2>Candidats</h2>
        <a class=" btn btn-primary mb-2 align-items-center d-flex gap-1" style="width:fit-content;"
            href="{{ url('candidats/create') }}"><x-far-square-plus style="width:20px" /> Nouveau
            candidat</a>
    </div>

    @if (session('status'))
        <div class="class alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div id="toolbar">
        your buttons here
    </div>
    <div class="table-responsive">

        <table id=candidat-table class="table table-striped table-hover border caption-top" data-toggle='table'
            data-pagination="true" data-search-align="right" data-search="true" data-toolba="#toolbar">

            <thead align="left">
                <th></th>
                <th data-field="id" data-sortable="true">#</th>
                <th data-field="prenom" data-sortable='true'>Prenom</th>
                <th data-field="nom" data-search="true">Nom</th>
                <th data-field="partie" data-sortable="true">Partie</th>
                <th data-field="biographie">Biographie</th>
                <th data-field="buttons" width="20%" class="py-2">Actions</th>
            </thead>

            @foreach ($candidats as $candidat)
                <tr align="left">
                    <td>
                        @if ($candidat->photo != 'mike')
                            <img src="/img/{{ $candidat->photo }}.jpg" alt="" width="80px" class="rounded">
                        @else
                            <div class="bg-primary rounded text-white py-4">
                                <h1 class="text-center">
                                    ?
                                </h1>

                            </div>
                        @endif
                    </td>
                    <td>
                        {{ $candidat->id }}
                    </td>
                    <td>
                        {{ $candidat->prenom }}
                    </td>
                    <td>
                        {{ $candidat->nom }}
                    </td>
                    <td>
                        {{ $candidat->partie }}
                    </td>
                    <td>
                        {{ substr($candidat->biographie, 0, 150) }}...
                    </td>

                    <td class="px-2 py-2 ">
                        <div class="d-flex gap-2">

                            <a class="btn btn-light d-block d-flex"
                                href="{{ route('view_candidate', $candidat->id) }}"><x-far-eye style="width:20px" /></a>

                            <a class="btn btn-warning d-block d-flex" href="/candidats/update/{{ $candidat->id }}">
                                <x-far-pen-to-square class="text-white" style="width:20px" /></a>

                            <a href="/candidats/delete/{{ $candidat->id }}"
                                class="btn btn-danger d-block d-flex"><x-far-trash-can style="width:20px" /></a>
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>

    </div>
    <script>
        function buttons() {
            return {
                btnAddCandidate: {
                    text: 'Ajouter un candidat',
                    icon: '',
                    event: function() {
                        alert('Do some stuff to e.g. search all users which has logged in the last week')

                    },
                    attributes: {
                        title: 'Search all users which has logged in the last week'
                    }
                },

            }
        }
    </script>
@endsection
