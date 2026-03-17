<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<style>
body {
    font-family: DejaVu Sans;
    font-size: 10px;
}

h2 {
    text-align: center;
    margin-bottom: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid black;
    padding: 3px;
    text-align: center;
}

th {
    background: #eee;
}

.name-col {
    width: 150px;
    text-align: left;
}
</style>

</head>
<body>

<h2>FICHE DE PRÉSENCE - {{ $mois }}/{{ $annee }}</h2>

<table>
<thead>
<tr>
<th class="name-col">NOM ET PRENOMS</th>

@for($i=1; $i<=31; $i++)
<th>{{ $i }}</th>
@endfor

</tr>
</thead>

<tbody>

@foreach($techniciens as $technicien => $records)
<tr>

<td class="name-col">{{ $technicien }}</td>

@for($day=1; $day<=31; $day++)

@php
$found = $records->first(function($item) use ($day) {
    return date('d', strtotime($item->date_pointage)) == $day;
});
@endphp

<td>

@if($found)
    @if($found->present)
        P
    @else
        A
    @endif
@endif

</td>

@endfor

</tr>
@endforeach

</tbody>
</table>

</body>
</html>
