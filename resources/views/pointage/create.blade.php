@extends('layouts.dashboard')

@section('title','Fiche de présence')

@section('content')

<div class="p-8 bg-white rounded-xl shadow-md">

<h2 class="text-2xl font-bold mb-6">
📋 Fiche de présence mensuelle
</h2>

<form action="{{ route('pointage.storeMultiple') }}" method="POST">
@csrf

<div class="grid grid-cols-2 gap-4 mb-6">

<div>
<label class="font-semibold">Date</label>
<input type="date" name="date_pointage" class="w-full border rounded-lg p-2" required>
</div>

<div>
<label class="font-semibold">Heure</label>
<input type="time" name="heure_pointage" class="w-full border rounded-lg p-2">
</div>

</div>

<table class="w-full border">
<thead class="bg-gray-100">
<tr>
<th>#</th>
<th>Technicien</th>
<th>Présent</th>
<th>Absent</th>
<th>Pneus réparés</th>
<th>Observation</th>
</tr>
</thead>

<tbody>

@php
$techniciens = [
"ABDEL KADER GEULAYE",
"OUSSMAN ALY MOHAMED",
"ABDELAHI SARR",
"MAMADOU TIJANI FATIGA",
"MOHAMED ALY THIAME",
"LEHSSEN AHMED MOHAMED",
"IBRAHIM ABOU TOURE",
"RAMADAN BAH",
"MOHAMED AHMED RAMDAN",
"CHEIKHE MOHAMED SOULA",
"ABOU DJIBRIL NIAGE",
"ABDEL KADER HACHIM"
];
@endphp

@foreach($techniciens as $index => $tech)

<tr>

<td>{{ $loop->iteration }}</td>

<td>
{{ $tech }}
<input type="hidden" name="techniciens[]" value="{{ $tech }}">
</td>

<td>
<input type="radio" name="present[{{ $index }}]" value="1">
</td>

<td>
<input type="radio" name="present[{{ $index }}]" value="0">
</td>

<td>
<input type="number" name="nb_pneus_repares[]" class="border rounded w-full">
</td>

<td>
<input type="text" name="observation[]" class="border rounded w-full">
</td>

</tr>

@endforeach

</tbody>
</table>

<div class="mt-6">
<button class="bg-blue-600 text-white px-6 py-2 rounded">
Enregistrer la fiche
</button>
</div>

</form>

</div>

@endsection
