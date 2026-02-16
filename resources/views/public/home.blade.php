@extends('layouts.public')

@section('title', 'Événements disponibles')

@section('content')
    <div class="d-flex align-items-end justify-content-between gap-3 flex-wrap mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1" style="color: var(--text-dark);">Événements disponibles</h1>
            <div class="text-muted">Découvrez et réservez vos événements en quelques clics.</div>
        </div>
    </div>

    <div class="row g-4">
        @forelse($events as $event)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="event-card h-100">
                    <div class="position-relative">
                        @if($event->image)
                            <img src="{{ asset('storage/'.$event->image) }}" class="w-100 event-img" alt="{{ $event->title }}">
                            <div class="img-overlay"></div>
                        @else
                            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 190px; background: rgba(100,116,139,.12); color: var(--text-muted);">
                                <i class="fa-regular fa-image me-2"></i>
                                Aucune image
                            </div>
                        @endif

                        <div class="position-absolute bottom-0 start-0 p-3" style="z-index: 2;">
                            <div class="fw-semibold text-white">{{ $event->title }}</div>
                            <div class="small" style="color: rgba(255,255,255,.85);">
                                <i class="fa-solid fa-location-dot me-1"></i>{{ $event->place }}
                                <span class="mx-2">•</span>
                                <i class="fa-regular fa-calendar me-1"></i>{{ $event->date->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>

                    <div class="p-3 p-lg-4">
                        <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                            <div class="text-muted small">
                                <i class="fa-solid fa-location-dot me-1"></i>{{ $event->place }}
                                <span class="mx-2">•</span>
                                <i class="fa-regular fa-calendar me-1"></i>{{ $event->date->format('d/m/Y') }}
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <a class="btn btn-outline-primary btn-sm flex-grow-1" href="{{ route('events.show', $event) }}" style="border-color: var(--primary); color: var(--primary);">
                                <i class="fa-regular fa-eye me-2"></i>
                                Détails
                            </a>
                            <a class="btn btn-gradient btn-sm flex-grow-1" href="{{ route('reservations.create', $event) }}">
                                <i class="fa-solid fa-ticket me-2"></i>
                                Réserver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="table-card p-5 text-center">
                    <div class="fw-semibold mb-1">Aucun événement</div>
                    <div class="text-muted">Revenez bientôt pour découvrir les prochains événements.</div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
