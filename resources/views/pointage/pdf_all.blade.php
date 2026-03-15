<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
body { font-family: DejaVu Sans; font-size: 12px; }
table { width:100%; border-collapse: collapse; }
th, td { border: 1px solid black; padding:5px; text-align:center; }
th { background: #eee; }
</style>
</head>
<body>
<h2 style="text-align:center">Liste des Pointages</h2>

<p>Date impression : {{ now()->format('d/m/Y') }}</p>

<table>
<thead>
<tr>
<th>#</th>
<th>Technicien</th>
<th>Tâche</th>
<th>Date</th>
<th>Heure</th>
<th>Présence</th>
<th>Pneus réparés</th>
<th>Observation</th>
</tr>
</thead>
<tbody>
@foreach($pointages as $pointage)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $pointage->technicien }}</td>
<td>{{ $pointage->tache }}</td>
<td>{{ $pointage->date_pointage }}</td>
<td>{{ $pointage->heure_pointage }}</td>
<td>{{ $pointage->present ? 'Présent' : 'Absent' }}</td>
<td>{{ $pointage->nb_pneus_repares ?? '-' }}</td>
<td>{{ $pointage->observation ?? '-' }}</td>
</tr>
@endforeach
</tbody>
</table>
</body>
</html>
