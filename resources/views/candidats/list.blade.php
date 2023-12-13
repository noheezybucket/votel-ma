@extends('base')

@section('title', 'Candidats')

@section('content')


    <div class=" my-3 d-flex align-items-center justify-content-between gap-3">
        <h2>Candidats</h2>
        <a class="btn btn-primary" href="{{ url('candidats/create') }}">Nouveau candidat</a>
    </div>

    <table class="table table-striped table-hover border">
        <thead align="center">
            <th></th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Partie</th>
            <th>Biographie</th>
            <th width="30%" class="py-2">Actions</th>
        </thead>

        @foreach ($candidats as $candidat)
            <tr align="center">
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
                    {{ $candidat->biographie }}
                </td>
                <td class="px-2 py-2">
                    <a class="btn btn-light" href="candidats/read/{{ $candidat->id }}">Détails</a>
                    <a class="btn btn-primary" href="candidats/read/{{ $candidat->id }}">Parrainer</a>


                </td>
            </tr>
        @endforeach

    </table>
    {{-- 
    <div class="row gap-5 w-75 mx-auto">
        @foreach ($candidats as $candidat)
            <div class="col d-flex flex-column align-items-center border rounded max-w-100">

                <div>
                    <img src="/img/{{ $candidat->photo }}.jpg" alt="" class="rounded w-100 object-fit-cover" />

                </div>

                <h2>
                    {{ $candidat->nom }}

                    {{ $candidat->prenom }}
                </h2>
                <p class="text-center">
                    {{ $candidat->biographie }}

                </p>
                <div class="px-2 py-2">
                    <a class="btn btn-light" href="candidats/read/{{ $candidat->id }}">Voir</a>
                    <a class="btn btn-primary" href="candidats/update/{{ $candidat->id }}">Parrainer</a>

                </div>
            </div>
        @endforeach
    </div> --}}

@endsection
