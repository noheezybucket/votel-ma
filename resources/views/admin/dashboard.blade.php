@extends('base')

@section('title', 'Statistiques')


@section('content')
    <div class="container">

        <h1>
            Statistiques
        </h1>

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
