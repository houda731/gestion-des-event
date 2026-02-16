@extends('layouts.app')

@section('title', 'Connexion Admin')

@section('body')
    <div class="min-vh-100 d-flex align-items-center justify-content-center px-3" style="background: var(--background);">
        <div class="card border-0 shadow-soft-md rounded-soft" style="width: min(440px, 100%); background: var(--surface);">
            <div class="card-body p-4 p-lg-5">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3" style="width: 56px; height: 56px; background: linear-gradient(135deg, var(--primary), var(--secondary));">
                        <i class="fa-solid fa-shield-halved text-white fs-4"></i>
                    </div>
                    <h1 class="h4 fw-bold mb-1" style="color: var(--text-dark);">Connexion Administrateur</h1>
                    <div class="text-muted">Accédez au tableau de bord</div>
                </div>

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" style="color: var(--text-muted);">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="color: var(--text-muted);">Mot de passe</label>
                        <input type="password" name="password" class="form-control" required>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-gradient w-100 py-2">
                        <i class="fa-solid fa-right-to-bracket me-2"></i>
                        Se connecter
                    </button>

                    <div class="text-center mt-3">
                        <a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--primary);">Retour au site</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
