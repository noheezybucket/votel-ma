@extends('auth_base')

@section('form-text')
    Connectez-vous facilement à votre espace personnel.
@endsection

@section('auth-img')
    <img src="{{ asset('assets/welcome.jpg') }}" class="w-100" alt="menager">
@endsection

@section('auth-form')
    <form id="login-form" class="shadow-sm border rounded p-3">

        @include('components.form-header')

        @csrf
        <div class=" mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class=" mb-2">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control">
            <a href="{{ route('auth-page.change-password') }}" class="text-decoration-none d-block mt-2">Mot de passe
                oublié?</a>
        </div>
        <div class=" mb-2">
            <button type="button" class="btn btn-primary container-fluid" id="login-btn">Se connecter</button>
        </div>
        <div class="mb4">
            <p><span id="error" class="text-danger"></span></p>
        </div>

        <div>
            <p class="mt-2">Vous n'avez pas de compte? <br>
                <a href="{{ route('auth-page.register-client') }}">Recrutez du personnel</a> ou
                <a href="{{ route('auth-page.register-employee') }}">Trouvez un emploi</a>
            </p>
        </div>
    </form>
@endsection

@include('scripts/auth')
