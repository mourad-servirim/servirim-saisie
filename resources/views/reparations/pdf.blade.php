<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
    .header { text-align: center; margin-bottom: 20px; }
    .box { border: 1px solid #000; padding: 10px; margin-bottom: 15px; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th, td { border: 1px solid #000; padding: 6px; }
</style>
</head>
<body>

<div class="header">
    <h2>{{ $company['nom'] }}</h2>
    <p>
        Capital : {{ $company['capital'] }} |
        NIF : {{ $company['nif'] }} |
        RC : {{ $company['rc'] }}
    </p>
    <p>
        {{ $company['adresse'] }} <br>
        Tél : {{ $company['telephone'] }} |
        Email : {{ $company['email'] }}
    </p>
</div>

<div class="box">
    <strong>FICHE DE RÉPARATION</strong><br>
    Date impression : {{ now()->format('d/m/Y') }}
</div>

<table>
    <tr><th>Référence</th><td>{{ $reparation->reference }}</td></tr>
    <tr><th>Date d’entrée</th><td>{{ $reparation->date_entree }}</td></tr>
    <tr><th>Date de sortie</th><td>{{ $reparation->date_sortie }}</td></tr>
    <tr><th>Type de réparation</th><td>{{ $reparation->type_reparation }}</td></tr>
    <tr><th>Emplâtre (RAD)</th><td>{{ $reparation->emplatre_rad }}</td></tr>
    <tr><th>Gomme MTR (kg)</th><td>{{ $reparation->gomme_mtr }}</td></tr>
    <tr><th>Verre dissolut</th><td>{{ $reparation->verre_dissolut }}</td></tr>
    <tr><th>Durée réparation</th><td>{{ $reparation->duree_reparation }}</td></tr>
</table>

<br><br>
<p style="text-align:right">
    Signature responsable : ______________________
</p>

</body>
</html>
