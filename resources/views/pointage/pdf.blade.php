<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche de pointage</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #2563eb;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #2563eb;
        }
        .company {
            font-size: 13px;
            margin-top: 5px;
        }
        .section {
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        .label {
            font-weight: bold;
            background: #f1f5f9;
            width: 30%;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #555;
        }
    </style>
</head>
<body>

    <!-- ENTREPRISE -->
    <div class="header">
        <h1>SERVIRIM</h1>
        <div class="company">
            Maintenance & Réparation de Pneus Industriels<br>
            Zouerate – Mauritanie<br>
            📞 +222 XX XX XX XX
        </div>
    </div>

    <!-- TITRE -->
    <div class="section">
        <h3>FICHE DE POINTAGE</h3>
    </div>

    <!-- INFOS -->
    <table>
        <tr>
            <td class="label">Technicien</td>
            <td>{{ $pointage->technicien }}</td>
        </tr>
        <tr>
            <td class="label">Tâche</td>
            <td>{{ $pointage->tache ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Date</td>
            <td>{{ $pointage->date_pointage }}</td>
        </tr>
        <tr>
            <td class="label">Heure</td>
            <td>{{ $pointage->heure_pointage ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Présence</td>
            <td>
                {{ $pointage->present ? 'Présent' : 'Absent' }}
            </td>
        </tr>
        <tr>
            <td class="label">Pneus réparés</td>
            <td>{{ $pointage->nb_pneus_repares ?? '0' }}</td>
        </tr>
        <tr>
            <td class="label">Observation</td>
            <td>{{ $pointage->observation ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Besoins / Problèmes</td>
            <td>{{ $pointage->besoins ?? '-' }}</td>
        </tr>
    </table>

    <!-- FOOTER -->
    <div class="footer">
        Document généré automatiquement – {{ now()->format('d/m/Y H:i') }}
    </div>

</body>
</html>
