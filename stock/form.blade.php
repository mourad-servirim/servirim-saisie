@php
    $isEdit = isset($stock);
@endphp

<div class="p-8 bg-white rounded-xl shadow-md min-h-screen">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">
        {{ $isEdit ? '✏️ Modifier l\'article' : '➕ Ajouter un nouvel article' }}
    </h2>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ $isEdit ? route('stock.update', $stock->id) : route('stock.store') }}" method="POST" class="space-y-6">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">ITEM</label>
            <input type="text" name="item" value="{{ old('item', $stock->item ?? '') }}" 
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Désignation</label>
            <input type="text" name="designation" value="{{ old('designation', $stock->designation ?? '') }}" 
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-600 mb-1">Code</label>
            <input type="text" name="code" value="{{ old('code', $stock->code ?? '') }}" 
                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Quantité retirée</label>
                <input type="number" name="qte_retiree" min="0" value="{{ old('qte_retiree', $stock->qte_retiree ?? '') }}" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Quantité restante</label>
                <input type="number" name="qte_restante" min="0" value="{{ old('qte_restante', $stock->qte_restante ?? '') }}" 
                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('stock.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg shadow">
                Retour
            </a>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
                {{ $isEdit ? '✔️ Mettre à jour' : '💾 Enregistrer' }}
            </button>
        </div>
    </form>
</div>
