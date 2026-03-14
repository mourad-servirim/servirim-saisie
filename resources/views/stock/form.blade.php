<div class="grid grid-cols-2 gap-4">

<!-- ITEM -->
<div>
<label class="block text-sm font-medium text-gray-700">Item</label>
<input
type="text"
name="item"
value="{{ old('item', $stock->item ?? '') }}"
class="border p-2 rounded w-full"
required>
</div>

<!-- DESIGNATION -->
<div>
<label class="block text-sm font-medium text-gray-700">Désignation</label>
<input
type="text"
name="designation"
value="{{ old('designation', $stock->designation ?? '') }}"
class="border p-2 rounded w-full"
required>
</div>

<!-- CODE -->
<div>
<label class="block text-sm font-medium text-gray-700">Code</label>
<input
type="text"
name="code"
value="{{ old('code', $stock->code ?? '') }}"
class="border p-2 rounded w-full">
</div>

<!-- QUANTITE RETIREE -->
<div>
<label class="block text-sm font-medium text-gray-700">Quantité retirée</label>
<input
type="number"
name="qte_retiree"
value="{{ old('qte_retiree', $stock->qte_retiree ?? 0) }}"
class="border p-2 rounded w-full"
min="0">
</div>

<!-- QUANTITE RESTANTE -->
<div>
<label class="block text-sm font-medium text-gray-700">Quantité restante</label>
<input
type="number"
name="qte_restante"
value="{{ old('qte_restante', $stock->qte_restante ?? 0) }}"
class="border p-2 rounded w-full"
min="0">
</div>

</div>

<br>

<!-- BOUTON -->
<div class="flex justify-center">

<button
type="submit"
class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 shadow">

{{ $buttonText ?? 'Enregistrer' }}

</button>

</div>
