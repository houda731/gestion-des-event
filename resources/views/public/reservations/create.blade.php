@extends('layouts.public')

@section('title', 'Réserver')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="d-flex align-items-end justify-content-between gap-3 flex-wrap mb-3">
            <div>
                <h1 class="h4 fw-bold mb-1" style="color: var(--text-dark);">Réserver: {{ $event->title }}</h1>
                <div class="text-muted small">
                    <i class="fa-solid fa-location-dot me-1"></i>{{ $event->place }}
                    <span class="mx-2">•</span>
                    <i class="fa-regular fa-calendar me-1"></i>{{ $event->date->format('d/m/Y') }}
                </div>
            </div>
            <a href="{{ route('events.show', $event) }}" class="btn btn-outline-secondary" style="border-color: var(--border); color: var(--text-dark);">
                <i class="fa-solid fa-arrow-left me-2"></i>
                Retour
            </a>
        </div>

        <div class="table-card">
            <div class="p-4 p-lg-5">
                <form method="POST" action="{{ route('reservations.store', $event) }}">
                    @csrf

                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label" style="color: var(--text-muted);">Nom complet</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" required>
                            @error('full_name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" style="color: var(--text-muted);">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" style="color: var(--text-muted);">Nombre de places</label>
                            <select name="number_of_places" class="form-select" required>
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ old('number_of_places') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                            @error('number_of_places')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 pt-2">
                            <button type="submit" class="btn btn-gradient px-4 py-2">
                                <i class="fa-solid fa-ticket me-2"></i>
                                Réserver maintenant
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
