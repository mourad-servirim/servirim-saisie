@extends('layouts.app')

@section('title', 'Connexion - Servirim')

@section('content')
<div class="login-container vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class="login-card p-5 rounded shadow-lg animate__animated animate__fadeIn">
        <h2 class="text-center mb-4 fw-bold text-primary">Connexion Administrateur</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}" class="login-form">
            @csrf

            <!-- Nom -->
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nom</label>
                <input type="text" class="form-control form-control-lg custom-input" id="name" name="name" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control form-control-lg custom-input" id="email" name="email" required>
            </div>

            <!-- Mot de passe -->
            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Mot de passe</label>
                <input type="password" class="form-control form-control-lg custom-input" id="password" name="password" required>
            </div>

            <!-- Site -->
            <div class="mb-3">
                <label for="site" class="form-label fw-semibold">Site</label>
                <input type="text" class="form-control form-control-lg custom-input" id="site" name="site" required>
            </div>

            <!-- Bouton -->
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary btn-lg btn-hover">Se connecter</button>
            </div>
        </form>

        <p class="text-center mt-4 text-muted small">&copy; {{ date('Y') }} Servirim</p>
    </div>
</div>
@endsection
