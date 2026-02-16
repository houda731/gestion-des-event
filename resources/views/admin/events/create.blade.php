@extends('layouts.admin')

@section('title', 'Créer un événement')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Créer un événement</h1>
<div class="bg-white p-6 rounded border border-gray-200">
    <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium">Titre</label>
            <input type="text" name="title" value="{{ old('title') }}" class="mt-1 block w-full border-gray-300 rounded" required>
            @error('title')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <div>
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" class="mt-1 block w-full border-gray-300 rounded" rows="4">{{ old('description') }}</textarea>
            @error('description')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium">Date</label>
                <input type="date" name="date" value="{{ old('date') }}" class="mt-1 block w-full border-gray-300 rounded" required>
                @error('date')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="block text-sm font-medium">Lieu</label>
                <input type="text" name="place" value="{{ old('place') }}" class="mt-1 block w-full border-gray-300 rounded" required>
                @error('place')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium">Image</label>
            <input type="file" name="image" class="mt-1 block w-full border-gray-300 rounded">
            @error('image')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
        </div>
        <div>
            <button class="px-6 py-3 bg-indigo-600 text-white rounded">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
