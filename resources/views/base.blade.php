<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>@yield('title')</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary py-3">
        <div class="container-fluid">
            <a class="navbar-brand text-xl bg-light rounded p-2 text-primary" href="/">ParrainApp</a>
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
</body>

</html>
