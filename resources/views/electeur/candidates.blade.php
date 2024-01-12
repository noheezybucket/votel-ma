@extends('base')

@section('title', 'Candidats')

@section('content')
    <div class=" container">
        @foreach ($candidats as $candidat)
            <div class="card mb-3" style="max-width: 540px; margin:0 auto">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('/uploads/images/' . $candidat->photo) }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $candidat->prenom }} {{ $candidat->nom }}</h5>
                            <p class="card-text">{{ $candidat->biographie }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $candidat->updatedAt }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
