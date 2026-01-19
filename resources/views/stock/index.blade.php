@extends('layouts.dashboard')

@section('title', 'État du Stock - Servirim')

@section('content')
<div class="p-8 bg-white rounded-xl shadow-md min-h-screen">

    <h2 class="text-2xl font-bold text-gray-700 mb-6">📦 État du stock</h2>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Bouton ajouter un nouvel article -->
    <div class="mb-4">
        <a href="{{ route('stock.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700">
            ➕ Ajouter un article
        </a>
        <br>
        <br>
         <a href="{{ route('stock.printAll') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg shadow">
        🖨️ Imprimer la liste complète
    </a>
    </div>

    <!-- Tableau des stocks -->
    <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
        <table class="w-full text-sm text-gray-700">
            <thead class="bg-blue-100 text-gray-700 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-4 py-3 text-left">ITEM</th>
                    <th class="px-4 py-3 text-left">Désignation</th>
                    <th class="px-4 py-3 text-left">Code</th>
                    <th class="px-4 py-3 text-left">Quantité retirée</th>
                    <th class="px-4 py-3 text-left">Quantité restante</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($stocks as $stock)
                    <tr class="hover:bg-blue-50 transition duration-150">
                        <td class="px-4 py-3 border">{{ $stock->item }}</td>
                        <td class="px-4 py-3 border">{{ $stock->designation }}</td>
                        <td class="px-4 py-3 border">{{ $stock->code ?? '-' }}</td>
                        <td class="px-4 py-3 border">{{ $stock->qte_retiree }}</td>
                        <td class="px-4 py-3 border">{{ $stock->qte_restante }}</td>
                        <td class="px-4 py-3 border text-center">
                            <a href="{{ route('stock.edit', $stock->id) }}" class="text-blue-600 hover:text-blue-800">
                                ✏️ Modifier
                            </a>
                           
                                    
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500 italic">
                            Aucun article en stock.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
