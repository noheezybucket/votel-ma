<div class="d-flex flex-column flex-shrink-0 p-2 bg-primary h-100" style="width: 250px;">
    <a class="navbar-brand text-xl  rounded p-3  text-primary bg-light fw-bold d-flex justify-content-center gap-3"
        href="/">
        <x-far-envelope style="width: 30px; margin-left:5px" />
        <span class="fs-4">Votél Ma</span>
    </a>
    <hr class="text-white">
    <ul class="nav nav-pills flex-column gap-1 mb-auto h-100">
        <li>
            <a class="nav-link navicon-item text-white" aria-current="true"
                href="{{ route('admin.dashboard') }}"><x-fas-chart-line class="navicon" />Dashboard</a>
        </li>
        <li>
            <a class="nav-link navicon-item text-white" aria-current="page"
                href="{{ route('admin.list-candidate') }}"><x-fas-user-tie class="navicon" />
                <span>Candidats</span> </a>
        </li>
        {{-- <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed text-primary w-100"
                data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                <x-fas-user-tie class="navicon" /> Candidat
            </button>
            <button
                class="btn btn-toggle gap-1 d-flex justify-content-start align-items-center rounded collapsed text-white w-100"
                data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                <x-fas-user-tie class="navicon" /> <span> Candidat</span>
            </button>
            <div class="collapse show" id="home-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li> <a class="nav-link navicon-item link-light rounded" aria-current="page"
                            href="{{ route('admin.list-candidate') }}">
                            Liste des candidats</a></li>
                    <li> <a class="nav-link navicon-item link-light rounded" aria-current="page"
                            href="{{ route('admin.create-candidate') }}">
                            Ajouter un candidat</a></li>
                </ul>
            </div>
        </li> --}}

        <li>
            <a class="nav-link navicon-item text-white" aria-current="page" href="{{ route('admin.list-secteurs') }}">
                <x-fas-list class="navicon" /> <span>Secteurs</span> </a>
        </li>
        <li>
            <a class="nav-link navicon-item text-white" aria-current="page"
                href="{{ route('admin.list-programs') }}"><x-fas-folder-open class="navicon" />
                <span>Programmes</span></a>
        </li>

    </ul>
    <button class="btn btn-light" id="logout"><x-fas-plug-circle-xmark style="width:18px" /> Se
        déconnecter</button>
    <hr class="text-white">
    <div class="dropdown">
        <a href="#"
            class="d-flex align-items-center justify-content-center link-light text-decoration-none dropdown-toggle h-100"
            id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <x-fas-circle-user class="text-light" style="width: 22px; margin-right:10px" />

            <strong>Administrateur</strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#"><x-fas-gear style="width:15px" /> Paramètres</a></li>
            {{-- <li>
                <hr class="dropdown-divider">
            </li> --}}

        </ul>
    </div>
</div>
