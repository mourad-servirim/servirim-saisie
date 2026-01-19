<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Liste du Stock - SERVIRIM</title>
<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 13px; }
    .header { text-align: center; margin-bottom: 20px; }
    table { width: 100%; border-collapse: collapse; margin-top:20px; }
    th, td { border: 1px solid #000; padding: 6px; text-align: center; }
    th { background: #f0f0f0; font-weight: bold; }
</style>
</head>
<body>

<div class="header">
    <h2><strong>{{ $company['nom'] }}</strong></h2>
    <p>{{ $company['adresse'] }}</p>
    <p><strong>Tél:</strong> {{ $company['telephone'] }} | <strong>Email:</strong> {{ $company['email'] }}</p>
    <p><strong>Site:</strong> {{ $company['site'] }}</p>
    <hr>
    <h3>📄 <strong>Liste complète du stock</strong></h3>
</div>

<table>
<thead>
<tr>
    <th>#</th>
    <th>Item</th>
    <th>Désignation</th>
    <th>Code</th>
    <th>Qté Retirée</th>
    <th>Qté Restante</th>
</tr>
</thead>
<tbody>
@foreach($stocks as $key => $s)
<tr>
    <td>{{ $key + 1 }}</td>
    <td>{{ $s->item }}</td>
    <td>{{ $s->designation }}</td>
    <td>{{ $s->code }}</td>
    <td>{{ $s->qte_retiree }}</td>
    <td>{{ $s->qte_restante }}</td>
</tr>
@endforeach
</tbody>
</table>

<br><br><br>

<p style="text-align:right;">Signature : ________________________</p>

</body>
</html>
