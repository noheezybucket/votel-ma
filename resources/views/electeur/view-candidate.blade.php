@extends('base')

@section('title', 'Vue unique')


@section('content')
    @include('components.electeur-menu')
    <div class="container mt-3">

        <div>
            <div class="row  rounded-3">
                <div
                    class="mb-2 d-flex align-items-center bg-light text-primary rounded-3 p-3 justify-content-between container-sm mx-auto">
                    <h4 class="m-0">Informations du candidat</h4>
                    @if ($candidat->validate === 0)
                        <h4 class="m-0">Validation : <span class="text-danger"> <x-fas-xmark style="width: 30px" />
                            </span>
                        </h4>
                    @else
                        <h4 class="m-0">Validation : <span class="text-success"> <x-fas-check style="width: 30px" /></span>
                        </h4>
                    @endif
                </div>

                <hr>
                <div class="d-flex align-items-center gap-3 border rounded-3">
                    <img src="{{ asset('/uploads/images/' . $candidat->photo) }}" class="rounded-circle object-fit-cover"
                        height="150px" width="150px" alt="...">
                    <div>
                        <p class="fs-2">{{ $candidat->prenom }} {{ $candidat->nom }} </p>
                        <p class="fs-2">Partie - {{ $candidat->partie }} </p>
                    </div>
                </div>
                <p class="text-justify mt-2"> {{ $candidat->biographie }} </p>
            </div>

            <div class="mb-2 d-flex  bg-light text-primary rounded-3 p-3 justify-content-between container-sm mx-auto">
                <h4 class="m-0">Programmes</h4>

            </div>
            <hr>
            <div class="d-flex gap-3">
                @if (count($candidat->programmes) > 0)
                    @foreach ($candidat->programmes as $programme)
                        <div class="card text-bg-primary mb-3" style="max-width: 18rem; width:100%">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $programme->titre }}</h5>
                                {{-- <p class="card-text">{{ $programme->contenu }}</p> --}}
                            </div>
                            <a href="{{ route('electeur.view-program', ['id' => $programme->id]) }}"
                                class="btn btn-light m-2">Voir les détails <x-fas-plus style="width:20px" /> </a>

                        </div>
                    @endforeach
                @else
                    <p>Aucun programme n'a été assigné à ce candidat pour le moment...</p>
                @endif
            </div>
        </div>
    </div>

@endsection
