<nav class="app-topbar navbar navbar-expand bg-surface border-soft px-3 px-lg-4 py-3">
    <div class="d-flex align-items-center gap-2">
        <button class="btn d-md-none border-soft rounded-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebarMobile" aria-controls="adminSidebarMobile">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div>
            <div class="fw-semibold" style="color: var(--text-dark);">@yield('page_title', 'Admin')</div>
            <div class="small text-muted">Gestion des Événements</div>
        </div>
    </div>

    <div class="ms-auto d-flex align-items-center gap-2">
        <button type="button" class="btn border-soft rounded-3" id="themeToggle" aria-label="Basculer le thème">
            <i class="fa-solid fa-moon"></i>
        </button>

        <div class="dropdown">
            <button class="btn border-soft rounded-3 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user me-2"></i>
                Admin
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}" class="px-2">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fa-solid fa-right-from-bracket me-2"></i>
                            Se déconnecter
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
