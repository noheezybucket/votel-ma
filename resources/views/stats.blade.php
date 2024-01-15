@extends('base')

@section('title', 'Statistiques')

@if (request()->is('admin/*'))
    @section('sidebar')
        @include('components.admin-sidebar')
    @endsection
@endif
@section('content')
    @if (request()->is('electeur/*'))
        @include('components.electeur-menu')
    @endif

    <div class="container p-2">
        <div
            class="mb-5 d-flex align-items-center bg-light text-primary rounded-3 p-3 justify-content-between container-sm mx-auto">
            <h4 class="m-0">Sondages & Résultats
            </h4>
            <img src="{{ asset('/img/senegal.svg') }}" alt="" width="40px" class="rounded-3">
        </div>

        <div class="row row-cols-2">
            <div class="col">

                {!! $chart1->container() !!}
            </div>
            <div class="col">
                {!! $chart2->container() !!}

            </div>
        </div>

    </div>
    {!! $chart1->script() !!}
    {!! $chart2->script() !!}

@endsection
