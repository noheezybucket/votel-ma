@extends('base')

@section('title', 'Vue unique')


@section('content')
@include('components.electeur-menu')
    <div class="container">
        <div>
            <div class="row">

                <div class="d-flex justify-content-between align-items-center">
                    <h3>Informations du candidat</h3>
                    @if ($candidat->validate === 0)
                        <h4>Validation : <span class="text-danger"> <x-fas-xmark style="width: 30px" />
                            </span>
                        </h4>
                    @else
                        <h4>Validation : <span class="text-success"> <x-fas-check style="width: 30px" /></span></h4>
                    @endif
                </div>
                <hr>
                <div class="w-25">
                    <img src="{{ asset('/uploads/images/' . $candidat->photo) }}" class="rounded-circle object-fit-cover"
                        height="200px" width="200px" alt="...">
                </div>
                <div class="w-75">
                    <p class="fs-5">{{ $candidat->prenom }} {{ $candidat->nom }} </p>
                    <p class="fs-5">Partie : {{ $candidat->partie }} </p>
                </div>
                <p class="text-justify mt-2"> {{ $candidat->biographie }} </p>
            </div>

            <h3>Programmes</h3>
            <hr>
            <div class="d-flex gap-3">
                @if (count($candidat->programmes) > 0)

                    @foreach ($candidat->programmes as $programme)
                        <div class="card text-bg-primary mb-3" style="max-width: 18rem; width:100%">
                            <div class="card-header">
                                <span class="rounded-1 bg-info text-white p-1">Santé</span>
                                <span class="rounded-1 bg-danger text-white p-1">Pêche</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $programme->titre }}</h5>
                                <p class="card-text">{{ $programme->contenu }}</p>
                            </div>
                            <a href="{{ route('electeur.view-program', ['id' => $programme->id]) }}"
                                class="btn btn-light m-2">Voir les détails <x-fas-plus style="width:20px" /> </a>
                            <a href="{{ asset('/uploads/documents' . $programme->document) }}"
                                class="btn btn-outline-light m-2">Télécharger le document <x-fas-download
                                    style="width:20px" /></a>

                        </div>
                    @endforeach
                @else
                    <p>Aucun programme n'a été assigné à ce candidat pour le moment...</p>
                @endif
            </div>
        </div>
    </div>

@endsection
