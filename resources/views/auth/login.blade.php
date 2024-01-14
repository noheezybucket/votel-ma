@extends('auth-base')

@section('title', 'Connexion')
@section('auth-img')
    <img src="{{ asset('img/login.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Vote">
@endsection

@section('auth-form')
    <form id="login-form" class="shadow-sm border rounded p-3" style="max-width: 500px; width:100%">
        <div
            class="d-flex justify-content-center align-items-center text-2xl mb-2 rounded p-2 bg-light text-primary fw-bold">
            <x-far-circle-user style="width: 50px; margin-right:5px" />

            <span class="fs-3">Connexion</span>
        </div>
        @csrf
        <div class=" mb-2">
            <label for="cni" class="form-label">Numéro CNI</label>
            <input type="text" id="cni" name="cni" class="form-control">
        </div>
        <div class=" mb-2">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control">
            <a href="" class="text-decoration-none d-block mt-2">Mot de passe
                oublié?</a>
        </div>
        <div class=" mb-2">
            <button type="button" class="btn btn-outline-primary container-fluid" id="login-btn">Se connecter
                <x-fas-arrow-right-to-bracket style="width: 20px; margin-right:5px" />

            </button>
        </div>
        <div class="mb4">
            <p><span id="error" class="text-danger"></span></p>
        </div>

        <div>
            <p class="mt-2">Vous n'avez pas de compte? <br>
                <a href="{{ route('auth.register-form') }}">Inscrivez-vous facilement ici</a>
            </p>
        </div>
    </form>
@endsection

{{-- @include('scripts/auth') --}}
