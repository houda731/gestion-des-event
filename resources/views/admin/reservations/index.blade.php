@extends('layouts.admin')

@section('title', 'Réservations')

@section('page_title', 'Réservations')

@section('content')
<div class="table-card">
    <div class="p-4 d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <div>
            <div class="fw-semibold" style="color: var(--text-dark);">Liste des réservations</div>
            <div class="text-muted small">Suivi des réservations et des participants</div>
        </div>
        <div class="input-group" style="width: min(380px, 100%);">
            <span class="input-group-text" style="border-color: var(--border); background: var(--surface);">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" class="form-control" placeholder="Rechercher..." data-search-input="#reservationsTable">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped align-middle mb-0" id="reservationsTable" data-search-table>
            <thead>
                <tr>
                    <th>Nom complet</th>
                    <th>Email</th>
                    <th>Événement</th>
                    <th>Places</th>
                    <th>Date de réservation</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $res)
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

    <div class="p-3 p-lg-4 border-top" style="border-color: var(--border)!important;">
        <div class="d-flex justify-content-end">
            {{ $reservations->links() }}
        </div>
    </div>
</div>
@endsection
