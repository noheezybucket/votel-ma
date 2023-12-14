@extends('base')

@section('title', 'Candidats')

@section('content')


    <div class=" my-3 d-flex align-items-center justify-content-between gap-3">
        <h2>Candidats</h2>
        <a class="btn btn-primary" href="{{ url('candidats/create') }}">Nouveau candidat</a>
    </div>

    <table class="table table-striped table-hover border">
        <thead align="left">
            <th></th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Partie</th>
            <th>Biographie</th>
            <th width="30%" class="py-2">Actions</th>
        </thead>

        @foreach ($candidats as $candidat)
            <tr align="left">
                <td>
                    @if ($candidat->photo != '')
                        <img src="/img/{{ $candidat->photo }}.jpg" alt="" width="80px" class="rounded">
                    @else
                        <div class="bg-primary rounded text-white py-4">
                            <h1>
                                ?
                            </h1>

                        </div>
                    @endif
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
                    {{ substr($candidat->biographie, 0, 200) }}
                </td>

                <td class="px-2 py-2">
                    <a class="btn btn-light" href="/candidats/read/{{ $candidat->id }}">Voir</a>
                    <a class="btn btn-warning" href="/candidats/update/{{ $candidat->id }}">Modifier</a>
                    <a class="btn btn-danger" href="/candidats/read/{{ $candidat->id }}">Supprimer</a>


                </td>
            </tr>
        @endforeach

    </table>


@endsection
