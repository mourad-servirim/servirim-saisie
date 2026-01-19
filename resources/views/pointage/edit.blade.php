@extends('layouts.dashboard')

@section('title', 'Modifier le pointage')

@section('content')
<div class="p-8 bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-700 mb-6 flex items-center">
        <i class="bx bx-edit text-blue-600 mr-2 text-3xl"></i>
        Modifier le pointage
    </h2>

    <form action="{{ route('pointage.update', $pointage->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Nom du technicien</label>
            <input type="text" name="technicien" value="{{ $pointage->technicien }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Tâche du jour</label>
            <input type="text" name="tache" value="{{ $pointage->tache }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Date</label>
                <input type="date" name="date_pointage" value="{{ $pointage->date_pointage }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Heure</label>
                <input type="time" name="heure_pointage" value="{{ $pointage->heure_pointage }}"
                       class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Présence</label>
            <select name="present" class="w-full border-gray-300 rounded-lg shadow-sm">
                <option value="1" {{ $pointage->present ? 'selected' : '' }}>Présent</option>
                <option value="0" {{ !$pointage->present ? 'selected' : '' }}>Absent</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Nombre de pneus réparés</label>
            <input type="number" name="nb_pneus_repares" min="0" value="{{ $pointage->nb_pneus_repares }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Observation</label>
            <textarea name="observation" rows="3"
                      class="w-full border-gray-300 rounded-lg shadow-sm">{{ $pointage->observation }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Besoins / Problèmes</label>
            <textarea name="besoins" rows="3"
                      class="w-full border-gray-300 rounded-lg shadow-sm">{{ $pointage->besoins }}</textarea>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('pointage.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg shadow">
                Retour
            </a>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
