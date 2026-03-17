@extends('layouts.dashboard')

@section('title', 'Fiche mensuelle')

@section('content')

<div class="p-6 bg-white rounded-xl shadow">

<h2 class="text-xl font-bold mb-4 text-center">
FICHE DE PRÉSENCE - {{ $mois }}/{{ $annee }}
</h2>

<div class="overflow-x-auto">
<table class="w-full border border-gray-300 text-xs">

<thead class="bg-gray-200">
<tr>
<th class="border px-2 py-1">NOM ET PRENOMS</th>

@for($i=1; $i<=31; $i++)
<th class="border px-2 py-1">{{ $i }}</th>
@endfor

</tr>
</thead>

<tbody>

@foreach($techniciens as $technicien => $records)
<tr>

<td class="border px-2 py-1 font-semibold">
{{ $technicien }}
</td>

@for($day=1; $day<=31; $day++)

@php
$found = $records->first(function($item) use ($day) {
    return date('d', strtotime($item->date_pointage)) == $day;
});
@endphp

<td class="border text-center py-1">

@if($found)
    @if($found->present)
        ✔
    @else
        ✖
    @endif
@endif

</td>

@endfor

</tr>
@endforeach

</tbody>

</table>
<br>
<br>
</div>
<a href="{{ route('pointage.printFicheMensuelle') }}"
class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 mb-4 inline-flex items-center">
<i class="bx bx-printer mr-2"></i>
🖨️ Imprimer fiche mensuelle
</a>

</div>

@endsection
