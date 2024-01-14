@extends('auth-base')
@section('title', 'Insription')

@section('auth-img')
    <img src="{{ asset('img/register.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Vote">
@endsection

@section('auth-form')
    <form id="register-form" class="shadow-lg border rounded p-3 " style="max-width: 500px; width:100%">
        <div
            class="d-flex justify-content-center align-items-center text-2xl mb-2  rounded p-2 bg-primary text-light fw-bold">
            <x-far-circle-user style="width: 30px; margin-right:5px" />
            <span class="fs-3">Inscription</span>
        </div>
        <div class="my-2">
            <p><span id="error" class="text-danger"></span></p>
        </div>
        @csrf
        <input type="hidden" id="role" name="role" value="electeur">
        <div class=" mb-2">
            <label for="fullname" class="form-label">Nom Complet</label>
            <input type="text" id="fullname" name="fullname" class="form-control">
        </div>
        <div class=" mb-2">
            <label for="cni" class="form-label">N° Carte Nationale d'Identité (CNI)</label>
            <input type="text" id="cni" name="cni" class="form-control">
        </div>
        <div class=" mb-2">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>


        <div class=" my-4">

            <button type="button" class="btn btn-outline-primary container-fluid mt-2" id="register-btn">S'inscrire
                <x-fas-arrow-right-to-bracket style="width: 20px; margin-right:5px" />
            </button>
        </div>

        <div>
            <p class="mt-2">Vous avez déjà un compte? <br>
                <a href="{{ route('auth.login-form') }}">Connectez vous facilement ici</a>
            </p>
        </div>
    </form>
@endsection
@include('../scripts/auth')
