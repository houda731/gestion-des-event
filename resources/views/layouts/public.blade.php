@extends('layouts.app')

@section('body')
    <nav class="navbar navbar-expand bg-surface border-bottom" style="border-color: var(--border)!important;">
        <div class="container py-2">
            <a class="navbar-brand fw-semibold" href="{{ route('home') }}" style="color: var(--text-dark);">
                Gestion Événements
            </a>

            <div class="ms-auto d-flex align-items-center gap-2">
                <button type="button" class="btn border-soft rounded-3" id="themeToggle" aria-label="Basculer le thème">
                    <i class="fa-solid fa-moon"></i>
                </button>
                <a class="btn btn-outline-primary rounded-3" href="{{ route('admin.login.show') }}" style="border-color: var(--primary); color: var(--primary);">
                    <i class="fa-solid fa-lock me-2"></i>
                    Admin
                </a>
            </div>
        </div>
    </nav>

    <main class="container py-4 py-lg-5">
        @if(session('success'))
            <div class="alert alert-success shadow-soft rounded-soft border-soft" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i>
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="border-top" style="border-color: var(--border)!important; background: var(--surface);">
        <div class="container py-4 text-muted small">
            &copy; {{ date('Y') }} Gestion Événements Maroc
        </div>
    </footer>
@endsection
