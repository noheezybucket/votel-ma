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
    {{-- 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        *,
        *::after,
        *::before {
            font-family: 'Poppins'
        }
    </style> --}}


</head>

<body>
    <nav class="navbar navbar-expand-lg  bg-primary  py-3">
        <div class="container-fluid">
            <a class="navbar-brand text-xl  rounded p-2 bg-light text-primary fw-bold" href="/">ParrainApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active  text-white" aria-current="page" href="/candidats/list">Candidats</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active  text-white" aria-current="page" href="apprenants">Programmes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active  text-white" aria-current="page" href="formations">Secteurs</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="p-2">

        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>

</body>

</html>
