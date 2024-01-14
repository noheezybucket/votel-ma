{{-- <div class="d-flex flex-column flex-shrink-0 p-3 bg-light h-100 shadow-sm" style="width: 250px;">
    <a class="navbar-brand text-xl  rounded p-2 bg-primary text-light fw-bold d-flex justify-content-center gap-3"
        href="/">
        <x-far-envelope style="width: 30px; margin-left:5px" />
        <span class="fs-4">ParrainApp</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto h-100">

        <li>
            <a class="nav-link" aria-current="page" href="{{ route('electeur.stats') }}"><x-fas-chart-line
                    class="navicon" /> Sondages</a></a>
        </li>
        <li>
            <a class="nav-link" aria-current="page" href="{{ route('electeur.candidates') }}"><x-fas-user-tie
                    class="navicon" />
                <span>Candidats</span></a>
        </li>
        <li>
            <a class="nav-link" aria-current="page" href="{{ route('electeur.programs') }}"><x-fas-folder-open
                    class="navicon" />
                <span>Programmes</span></a>
        </li>
        <li>
            <a class="nav-link" aria-current="page" href="{{ route('electeur.programs') }}">
                <x-fas-list class="navicon" /> <span>Secteurs</span>
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle h-100"
            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <x-fas-circle-user class="text-primary" style="width: 22px; margin-right:10px" />

            <strong>Mouhamad GUEYE</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#"><x-fas-gear style="width:15px" /> Paramètres</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#"><x-fas-plug-circle-xmark style="width:18px" /> Se
                    déconnecter</a></li>
        </ul>
    </div>
</div> --}}

<div class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top  py-3">
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
            <ul class="navbar-nav d-flex justify-content-between align-items-center w-100">
                <div class="d-flex">


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
                </div>

                <div class="dropdown">
                    <a href="#"
                        class="d-flex align-items-center link-light text-decoration-none dropdown-toggle h-100"
                        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <x-fas-circle-user class="text-light" style="width: 22px; margin-right:10px" />

                        <strong>Mouhamad GUEYE</strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#"><x-fas-gear style="width:15px" /> Paramètres</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"><x-fas-plug-circle-xmark style="width:18px" /> Se
                                déconnecter</a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</div>
