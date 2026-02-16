@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('page_title', 'Tableau de bord')

@section('content')
<div class="row g-4">
    <div class="col-12 col-md-4">
        <div class="stat-card p-4 h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small">Total Événements</div>
                    <div class="fs-2 fw-bold" style="color: var(--text-dark);">{{ $eventsCount }}</div>
                </div>
                <div class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 44px; height: 44px; background: rgba(79,70,229,.12); color: var(--primary);">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="stat-card p-4 h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small">Total Réservations</div>
                    <div class="fs-2 fw-bold" style="color: var(--text-dark);">{{ $reservationsCount }}</div>
                </div>
                <div class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 44px; height: 44px; background: rgba(34,197,94,.12); color: var(--success);">
                    <i class="fa-solid fa-ticket"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="stat-card p-4 h-100">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <div class="text-muted small">Utilisateurs</div>
                    <div class="fs-2 fw-bold" style="color: var(--text-dark);">{{ $usersCount ?? '—' }}</div>
                </div>
                <div class="d-inline-flex align-items-center justify-content-center rounded-3" style="width: 44px; height: 44px; background: rgba(245,158,11,.14); color: var(--warning);">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="table-card">
            <div class="p-4 d-flex align-items-center justify-content-between gap-3 flex-wrap">
                <div>
                    <div class="fw-semibold" style="color: var(--text-dark);">Dernières réservations</div>
                    <div class="text-muted small">Vue rapide des dernières demandes</div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="input-group" style="width: min(360px, 100%);">
                        <span class="input-group-text" style="border-color: var(--border); background: var(--surface);">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Rechercher..." data-search-input="#latestReservationsTable">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped mb-0" id="latestReservationsTable" data-search-table>
                    <thead>
                        <tr>
                            <th>Nom complet</th>
                            <th>Email</th>
                            <th>Événement</th>
                            <th>Places</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($latestReservations as $res)
                            <tr>
                                <td class="fw-semibold">{{ $res->full_name }}</td>
                                <td>{{ $res->email }}</td>
                                <td>{{ $res->event->title }}</td>
                                <td>{{ $res->number_of_places }}</td>
                                <td>{{ $res->created_at->timezone('Africa/Casablanca')->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-muted py-5">Aucune réservation</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
