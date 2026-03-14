@extends('layouts.dashboard')

@section('title', 'État du Stock - Servirim')

@section('content')

<div class="p-8 bg-white rounded-xl shadow-md min-h-screen">

<h2 class="text-2xl font-bold text-gray-700 mb-6">📦 État du stock</h2>

@if(session('success'))
<div class="bg-green-100 text-green-800 p-3 rounded-lg mb-4">
{{ session('success') }}
</div>
@endif

<div class="mb-4 flex gap-3">

<a href="{{ route('stock.create') }}"
class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700">
➕ Ajouter un article
</a>

<a href="{{ route('stock.printAll') }}"
class="bg-red-600 text-white px-4 py-2 rounded-lg shadow">
🖨️ Imprimer la liste complète
</a>

<button onclick="editSelected()"
class="bg-green-600 text-white px-5 py-2 rounded-lg shadow hover:bg-green-700">
✏️ Modifier
</button>

<button onclick="deleteSelected()"
class="bg-red-600 text-white px-5 py-2 rounded-lg shadow hover:bg-red-700">
🗑️ Supprimer
</button>

</div>

<div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">

<table class="w-full text-sm text-gray-700">

<thead class="bg-blue-100 text-gray-700 uppercase text-xs font-semibold">
<tr>

<th class="px-4 py-3"></th>
<th class="px-4 py-3 text-left">ITEM</th>
<th class="px-4 py-3 text-left">Désignation</th>
<th class="px-4 py-3 text-left">Code</th>
<th class="px-4 py-3 text-left">Quantité retirée</th>
<th class="px-4 py-3 text-left">Quantité restante</th>

</tr>
</thead>

<tbody class="divide-y divide-gray-100">

@forelse($stocks as $stock)

<tr class="hover:bg-blue-50">

<td class="px-4 py-3">
<input type="radio" name="selected_stock"
value="{{ $stock->id }}">
</td>

<td class="px-4 py-3 border">{{ $stock->item }}</td>
<td class="px-4 py-3 border">{{ $stock->designation }}</td>
<td class="px-4 py-3 border">{{ $stock->code ?? '-' }}</td>
<td class="px-4 py-3 border">{{ $stock->qte_retiree }}</td>
<td class="px-4 py-3 border">{{ $stock->qte_restante }}</td>

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


<script>

function editSelected()
{

let selected = document.querySelector('input[name="selected_stock"]:checked');

if(!selected)
{
alert("Veuillez sélectionner un article à modifier");
return;
}

window.location.href = "/stock/"+selected.value+"/edit";

}


function deleteSelected()
{

let selected = document.querySelector('input[name="selected_stock"]:checked');

if(!selected)
{
alert("Veuillez sélectionner un article à supprimer");
return;
}

if(confirm("Voulez-vous vraiment supprimer cet article ?"))
{

let form = document.createElement("form");
form.method = "POST";
form.action = "/stock/"+selected.value;

let csrf = document.createElement("input");
csrf.type = "hidden";
csrf.name = "_token";
csrf.value = "{{ csrf_token() }}";

let method = document.createElement("input");
method.type = "hidden";
method.name = "_method";
method.value = "DELETE";

form.appendChild(csrf);
form.appendChild(method);

document.body.appendChild(form);

form.submit();

}

}

</script>

@endsection
