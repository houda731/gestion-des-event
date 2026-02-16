@extends('layouts.public')

@section('title', $event->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-9">
        <div class="table-card">
            <div class="position-relative">
                @if($event->image)
                    <img src="{{ asset('storage/'.$event->image) }}" class="w-100" style="height: 320px; object-fit: cover;" alt="{{ $event->title }}">
                    <div class="img-overlay"></div>
                    <div class="position-absolute bottom-0 start-0 p-4" style="z-index: 2;">
                        <h1 class="h3 fw-bold text-white mb-1">{{ $event->title }}</h1>
                        <div class="text-white-50">
                            <i class="fa-solid fa-location-dot me-1"></i>{{ $event->place }}
                            <span class="mx-2">•</span>
                            <i class="fa-regular fa-calendar me-1"></i>{{ $event->date->format('d/m/Y') }}
                        </div>
                    </div>
                @endif
            </div>

            <div class="p-4 p-lg-5">
                @if(!$event->image)
                    <h1 class="h3 fw-bold mb-2" style="color: var(--text-dark);">{{ $event->title }}</h1>
                    <div class="text-muted mb-4">
                        <i class="fa-solid fa-location-dot me-1"></i>{{ $event->place }}
                        <span class="mx-2">•</span>
                        <i class="fa-regular fa-calendar me-1"></i>{{ $event->date->format('d/m/Y') }}
                    </div>
                @endif

                <div class="row g-4">
                    <div class="col-12 col-lg-8">
                        <div class="fw-semibold mb-2" style="color: var(--text-dark);">Description</div>
                        <div class="text-muted" style="white-space: pre-line;">{{ $event->description }}</div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="stat-card p-4">
                            <div class="fw-semibold mb-2" style="color: var(--text-dark);">Réservation</div>
                            <div class="text-muted small mb-3">Réservez vos places pour cet événement.</div>
                            <a href="{{ route('reservations.create', $event) }}" class="btn btn-gradient w-100">
                                <i class="fa-solid fa-ticket me-2"></i>
                                Réserver maintenant
                            </a>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100 mt-2" style="border-color: var(--border); color: var(--text-dark);">
                                <i class="fa-solid fa-arrow-left me-2"></i>
                                Retour
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
