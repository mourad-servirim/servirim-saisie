@extends('layouts.dashboard')

@section('title', 'Saisie du pointage')

@section('content')
<div class="p-8 bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-700 mb-6 flex items-center">
        <i class="bx bx-user-check text-blue-600 mr-2 text-3xl"></i>
        Nouveau pointage
    </h2>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire -->
    <form action="{{ route('pointage.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Nom du technicien</label>
            <input type="text" name="technicien" placeholder="Ex: Ahmed, Sidi, ..." 
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Tâche du jour</label>
            <input type="text" name="tache" placeholder="Ex: Réparation, montage..." 
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Date</label>
                <input type="date" name="date_pointage" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Heure</label>
                <input type="time" name="heure_pointage" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Présence</label>
            <select name="present" 
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="1">Présent</option>
                <option value="0">Absent</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Nombre de pneus réparés</label>
            <input type="number" name="nb_pneus_repares" min="0" 
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Observation</label>
            <textarea name="observation" rows="3" 
                      class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Besoins / Problèmes</label>
            <textarea name="besoins" rows="3" 
                      class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('pointage.index') }}" 
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg shadow">
                <i class="bx bx-arrow-back mr-1"></i> Retour
            </a>

            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
                <i class="bx bx-save mr-2"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
