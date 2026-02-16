@extends('layouts.admin')

@section('title', 'Événements')

@section('page_title', 'Événements')

@section('content')
<div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mb-3">
    <div>
        <div class="fw-semibold" style="color: var(--text-dark);">Gestion des événements</div>
        <div class="text-muted small">Créer, modifier et supprimer les événements</div>
    </div>
    <a href="{{ route('admin.events.create') }}" class="btn btn-gradient">
        <i class="fa-solid fa-plus me-2"></i>
        Créer un événement
    </a>
</div>

<div class="table-card">
    <div class="p-4 d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <div class="input-group" style="width: min(420px, 100%);">
            <span class="input-group-text" style="border-color: var(--border); background: var(--surface);">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" class="form-control" placeholder="Rechercher un événement..." data-search-input="#eventsTable">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped align-middle mb-0" id="eventsTable" data-search-table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Réservations</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td class="fw-semibold">{{ $event->title }}</td>
                        <td>{{ $event->date->format('d/m/Y') }}</td>
                        <td>{{ $event->place }}</td>
                        <td>{{ $event->reservations_count }}</td>
                        <td class="text-end">
                            <div class="d-inline-flex align-items-center gap-2">
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-primary" style="border-color: var(--primary); color: var(--primary);">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Supprimer cet événement ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-5">Aucun événement</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-3 p-lg-4 border-top" style="border-color: var(--border)!important;">
        <div class="d-flex justify-content-end">
            {{ $events->links() }}
        </div>
    </div>
</div>
@endsection
