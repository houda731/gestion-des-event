@extends('layouts.app')

@section('body')
    <div class="app-shell d-flex">
        @include('partials.admin-sidebar')

        <div class="flex-grow-1 d-flex flex-column" style="min-width: 0;">
            @include('partials.admin-navbar')

            <div class="container-fluid px-3 px-lg-4 py-4">
                @if(session('success'))
                    <div class="alert alert-success shadow-soft rounded-soft border-soft" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i>
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="adminSidebarMobile" aria-labelledby="adminSidebarMobileLabel" style="width: var(--sidebar-width); background: var(--surface);">
        <div class="offcanvas-header border-bottom" style="border-color: var(--border)!important;">
            <div class="d-flex align-items-center gap-2" id="adminSidebarMobileLabel">
                <span class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 40px; height: 40px; background: var(--primary);">
                    <i class="fa-solid fa-calendar-days text-white"></i>
                </span>
                <div class="fw-semibold" style="color: var(--text-dark);">Gestion Événements</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fermer"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="nav nav-pills flex-column gap-1">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-gauge-high me-2"></i>
                    Tableau de bord
                </a>
                <a class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}" href="{{ route('admin.events.index') }}">
                    <i class="fa-solid fa-calendar-check me-2"></i>
                    Événements
                </a>
                <a class="nav-link {{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}" href="{{ route('admin.reservations.index') }}">
                    <i class="fa-solid fa-ticket me-2"></i>
                    Réservations
                </a>
            </nav>

            <div class="pt-3 mt-3 border-top" style="border-color: var(--border)!important;">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="btn w-100 text-start" style="color: var(--danger); border: 1px solid var(--border); border-radius: 12px;">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                        Se déconnecter
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
