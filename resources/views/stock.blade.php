@extends('layouts.dashboard')

@section('title', 'État du Stock - Servirim')

@section('content')
<div class="p-8 bg-white rounded-xl shadow-md max-w-3xl mx-auto">

    <h2 class="text-2xl font-bold text-gray-700 mb-6 flex items-center">
        <i class="bx bx-package text-blue-600 mr-2 text-3xl"></i>
        Ajouter un article au stock
    </h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('stock.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">ITEM</label>
            <input type="number" name="item"
                   class="w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Désignation</label>
            <input type="text" name="designation"
                   class="w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Code</label>
            <input type="text" name="code"
                   class="w-full border-gray-300 rounded-lg shadow-sm">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Quantité retirée</label>
                <input type="number" name="quantite_retiree" min="0"
                       class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Quantité restante</label>
                <input type="number" name="quantite_restante" min="0"
                       class="w-full border-gray-300 rounded-lg shadow-sm" required>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
                Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
