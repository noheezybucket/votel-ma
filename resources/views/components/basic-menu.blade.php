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
             <ul class="navbar-nav">


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

             </ul>
         </div>
     </div>
     <div class="d-flex gap-3 w-25">
         <a href="{{ route('auth.login-form') }}" class="btn btn-outline-light d-block">Se connecter</a>
         <a href="{{ route('auth.register-form') }}" class="btn btn-light d-block">S'inscrire</a>
     </div>
 </div>
