@extends('layouts.dashboard')

@section('title', 'Nouvelle réparation')

@section('content')
<div class="p-8 bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Nouvelle réparation</h2>

    <form action="{{ route('reparations.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block font-semibold">Dimensions / Référence</label>
            <input type="text" name="reference"
                   class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Date entrée</label>
                <input type="date" name="date_entree"
                       class="w-full border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label class="block font-semibold">Date sortie</label>
                <input type="date" name="date_sortie"
                       class="w-full border-gray-300 rounded-lg">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Type réparation</label>
            <input type="text" name="type_reparation"
                   class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label>Emplâtre (RAD)</label>
                <input type="text" name="emplatre_rad"
                       class="w-full border-gray-300 rounded-lg">
            </div>
            <div>
                <label>Gomme MTR (kg)</label>
                <input type="number" step="0.1" name="gomme_mtr"
                       class="w-full border-gray-300 rounded-lg">
            </div>
            <div>
                <label>Verre Dissolut</label>
                <input type="number" step="0.1" name="verre_dissolut"
                       class="w-full border-gray-300 rounded-lg">
            </div>
        </div>

        <div>
            <label class="block font-semibold">Durée réparation</label>
            <input type="text" name="duree_reparation"
                   placeholder="Ex: 2H / un pneu"
                   class="w-full border-gray-300 rounded-lg">
        </div>

        <button class="bg-blue-600 text-white px-5 py-2 rounded-lg">Enregistrer</button>
    </form>
</div>
@endsection
