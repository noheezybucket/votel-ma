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

    <div class="container">
        <div
            class="mb-2 d-flex align-items-center bg-light text-primary rounded-3 p-3 justify-content-between container-sm mx-auto">
            <h4 class="m-0">Sondages & Résultats
            </h4>
            <img src="{{ asset('/img/senegal.svg') }}" alt="" width="40px" class="rounded-3">
        </div>

        <div class="d-flex">
            <div class="w-50">

                {!! $chart1->container() !!}
            </div>
            <div class="w-50">
                {!! $chart2->container() !!}

            </div>
        </div>

    </div>
    {!! $chart1->script() !!}
    {!! $chart2->script() !!}

@endsection
