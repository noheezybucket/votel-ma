@extends('auth-base')

@section('auth-img')
    <img src="{{ asset('img/register.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Vote">
@endsection

@section('auth-form')
    <form id="login-form" class="shadow-sm border rounded p-3" style="max-width: 500px; width:100%">
        <div class="d-flex justify-content-center align-items-center text-2xl  rounded p-2 bg-light text-primary fw-bold">
            <x-far-envelope style="width: 50px; margin-right:5px" />
            <span class="fs-3">ParrainApp</span>
        </div>
        <h3 class="my-3 text-center fs-6">Inscrivez facilement en remplissant le formulaire </h3>
        @csrf
        <div class=" mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class=" mb-2">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control">
            <a href="" class="text-decoration-none d-block mt-2">Mot de passe
                oublié?</a>
        </div>
        <div class=" mb-2">
            <button type="button" class="btn btn-primary container-fluid" id="login-btn">Se connecter</button>
        </div>
        <div class="mb4">
            <p><span id="error" class="text-danger"></span></p>
        </div>

        <div>
            <p class="mt-2">Vous avez déjà un compte? <br>
                <a href="{{ route('auth.login') }}">Connectez vous facilement ici</a>
            </p>
        </div>
    </form>
@endsection

{{-- @include('scripts/auth') --}}
