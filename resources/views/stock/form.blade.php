@csrf

<div class="space-y-4">

    <div>
        <label class="block font-semibold text-gray-600 mb-1">ITEM</label>
        <input type="text" name="item" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
    </div>

    <div>
        <label class="block font-semibold text-gray-600 mb-1">Désignation</label>
        <input type="text" name="designation" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
    </div>

    <div>
        <label class="block font-semibold text-gray-600 mb-1">Code</label>
        <input type="text" name="code" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-semibold text-gray-600 mb-1">Quantité retirée</label>
            <input type="number" name="qte_retiree" min="0" 
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
        </div>

        <div>
            <label class="block font-semibold text-gray-600 mb-1">Quantité restante</label>
            <input type="number" name="qte_restante" min="0"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400" required>
        </div>
    </div>

    <div class="flex justify-center mt-6">
        <button type="submit" 
            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 shadow">
            {{ $buttonText }}
        </button>
    </div>
</div>
