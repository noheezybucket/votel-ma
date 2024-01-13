<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    {{-- Bootstrap Tables --}}
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <title>@yield('title')</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');

        *,
        *::after,
        *::before {
            font-family: 'Montserrat';
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top  py-3">
        <div class="container-fluid">
            <a class="navbar-brand text-xl  rounded p-2 bg-light text-primary fw-bold" href="/">
                <x-far-envelope style="width: 30px; margin-left:5px" />
                <span>ParrainApp</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @if (request()->is('admin/*'))
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('electeur.stats') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('admin.list-candidate') }}">Candidats</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('admin.list-programs') }}">Programmes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('admin.list-secteurs') }}">Secteurs</a>
                        </li>
                    @endif

                    @if (request()->is('electeur/*'))
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('electeur.stats') }}">Statistiques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('electeur.candidates') }}">Candidats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('electeur.programs') }}">Programmes</a>
                        </li>
                    @endif


                    {{-- 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Candidat
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li> <a class="dropdown-item" aria-current="page"
                                    href="{{ route('admin.list-candidate') }}">Liste des candidats</a>
                            </li>
                            <hr class="dropdown-divider">
                            <li> <a class="dropdown-item" aria-current="page"
                                    href="{{ route('admin.create-candidate') }}">Créer un candidat</a>
                            </li>

                        </ul>
                    </li> --}}

                </ul>
            </div>
        </div>
        <div class="d-flex gap-3 w-25">
            <a href="{{ route('auth.login') }}" class="btn btn-outline-light d-block">Se connecter</a>
            <a href="{{ route('auth.register') }}" class="btn btn-light d-block">S'inscrire</a>
        </div>
    </nav>
    <div class="p-2">
        @yield('content')
    </div>
    {{-- charts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {{-- jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    @yield('scripts')
    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    {{-- bootstrap table --}}
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

</body>

</html>
