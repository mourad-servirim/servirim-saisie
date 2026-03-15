<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
body { font-family: DejaVu Sans; font-size: 12px; }
table { width: 100%; border-collapse: collapse; }
th, td { border:1px solid #000; padding:5px; text-align:center; }
</style>
</head>
<body>

<h2 style="text-align:center">{{ $company['nom'] }}</h2>

<table>
<thead>
<tr>
<th>#</th>
<th>Référence</th>
<th>Date entrée</th>
<th>Date sortie</th>
<th>Type</th>
<th>Emplâtre</th>
<th>Gomme</th>
<th>Verre</th>
<th>Durée</th>
</tr>
</thead>

<tbody>
@foreach($reparations as $rep)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $rep->reference }}</td>
<td>{{ $rep->date_entree }}</td>
<td>{{ $rep->date_sortie }}</td>
<td>{{ $rep->type_reparation }}</td>
<td>{{ $rep->emplatre_rad }}</td>
<td>{{ $rep->gomme_mtr }}</td>
<td>{{ $rep->verre_dissolut }}</td>
<td>{{ $rep->duree_reparation }}</td>
</tr>
@endforeach
</tbody>

</table>

</body>
</html>
