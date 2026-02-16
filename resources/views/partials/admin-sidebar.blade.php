<aside class="app-sidebar d-none d-md-flex flex-column p-3 p-lg-4">
    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none mb-4">
        <span class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 40px; height: 40px; background: var(--primary);">
            <i class="fa-solid fa-calendar-days text-white"></i>
        </span>
        <div class="fw-semibold" style="color: var(--text-dark);">Gestion Événements</div>
    </a>

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

    <div class="mt-auto pt-3">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn w-100 text-start" style="color: var(--danger); border: 1px solid var(--border); border-radius: 12px;">
                <i class="fa-solid fa-right-from-bracket me-2"></i>
                Se déconnecter
            </button>
        </form>
    </div>
</aside>
