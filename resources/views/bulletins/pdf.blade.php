<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; font-size: 13px; }
        .title { font-size: 18px; font-weight: bold; text-align: center; }
        .section-title { font-weight: bold; background: #eee; padding: 5px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        table, th, td { border: 1px solid #000; padding: 4px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>

<div class="title">BULLETIN DE SALAIRE</div>
<hr>

<h3>{{ $entreprise['nom'] }}</h3>
<p>
Capital Social: {{ $entreprise['capital'] }} - 
NIF: {{ $entreprise['nif'] }} - RC: {{ $entreprise['rc'] }} <br>
Tel: {{ $entreprise['telephone'] }} - Email: {{ $entreprise['email'] }} <br>
Adresse: {{ $entreprise['adresse'] }}
</p>
<hr>

<p class="section-title">Informations Employé</p>
<p>
Nom & Prénom : <strong>{{ $employe->nom_complet }}</strong><br>
NNI : {{ $employe->nni }}<br>
N° CNSS : {{ $employe->cnss }}<br>
N° CNAM : {{ $employe->cnam ?? '---' }}<br>
Fonction : {{ $employe->fonction }}<br>
Catégorie : {{ $employe->categorie }}<br>
Heures : {{ $employe->heures ?? 176 }}<br>
Lieu de travail : {{ $employe->lieu_travail }}
</p>

<hr>

<p class="section-title">Période</p>
<p>Du <strong>{{ $date_debut }}</strong> au <strong>{{ $date_fin }}</strong></p>
<hr>

<table>
    <thead>
        <tr>
            <th>CODE</th>
            <th>DESIGNATION</th>
            <th>TAUX</th>
            <th>MONTANT MRU</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>01</td>
            <td>Salaire de base</td>
            <td>-</td>
            <td>{{ number_format($employe->salaire_base, 2) }}</td>
        </tr>
        <tr>
            <td>02</td>
            <td>Prime de rendement</td>
            <td>1%</td>
            <td>150</td>
        </tr>
        <tr>
            <td>03</td>
            <td>Prime d'assiduité</td>
            <td>-</td>
            <td>1320</td>
        </tr>
        <tr>
            <td>04</td>
            <td>Prime de risque</td>
            <td>-</td>
            <td>54</td>
        </tr>
        <tr>
            <td>05</td>
            <td>Prime de distance</td>
            <td>-</td>
            <td>60</td>
        </tr>
        <tr>
            <td>06</td>
            <td>Prime de panier</td>
            <td>-</td>
            <td>1100</td>
        </tr>
        <tr>
            <td>07</td>
            <td>Cotisation CNSS</td>
            <td>1%</td>
            <td>{{ number_format($cnss, 2) }}</td>
        </tr>
        <tr>
            <td>08</td>
            <td>Cotisation CNAM</td>
            <td>4%</td>
            <td>{{ number_format($cnam, 2) }}</td>
        </tr>
        <tr>
            <td>09</td>
            <td>Impôt sur le salaire (ITS)</td>
            <td>15%</td>
            <td>{{ number_format($its, 2) }}</td>
        </tr>
        <tr>
            <td colspan="3"><strong>NET A PAYER</strong></td>
            <td><strong>{{ number_format($net_a_payer, 2) }} MRU</strong></td>
        </tr>
    </tbody>
</table>

<p style="text-align:center;">
Signature & Cachet : __________________________
</p>

</body>
</html>
