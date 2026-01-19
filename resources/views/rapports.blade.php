@extends('layouts.dashboard')

@section('title', 'Rapports - Servirim')

@section('content')
<div class="p-8 bg-white rounded-xl shadow-md space-y-10">

    <h2 class="text-2xl font-bold text-gray-700">📊 Rapports statistiques</h2>

    <!-- 1️⃣ Réparations par jour -->
    <div>
        <h3 class="font-semibold mb-3">Nombre de réparations par jour</h3>
        <canvas id="reparationsChart"></canvas>
    </div>

    <!-- 2️⃣ Présence / Absence -->
    <div>
        <h3 class="font-semibold mb-3">Présence des techniciens</h3>
        <canvas id="presenceChart"></canvas>
    </div>

    <!-- 3️⃣ Pneus réparés -->
    <div>
        <h3 class="font-semibold mb-3">Nombre total de pneus réparés</h3>
        <canvas id="pneusChart"></canvas>
    </div>

</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
/* ============================
   1️⃣ Réparations par jour
============================ */
const reparationsLabels = @json($reparationsParJour->pluck('jour'));
const reparationsData   = @json($reparationsParJour->pluck('total'));

new Chart(document.getElementById('reparationsChart'), {
    type: 'bar',
    data: {
        labels: reparationsLabels,
        datasets: [{
            label: 'Réparations',
            data: reparationsData,
            backgroundColor: '#3b82f6'
        }]
    }
});

/* ============================
   2️⃣ Présence / Absence
============================ */
new Chart(document.getElementById('presenceChart'), {
    type: 'pie',
    data: {
        labels: ['Présent', 'Absent'],
        datasets: [{
            data: [{{ $presence }}, {{ $absence }}],
            backgroundColor: ['#22c55e', '#ef4444']
        }]
    }
});

/* ============================
   3️⃣ Pneus réparés
============================ */
new Chart(document.getElementById('pneusChart'), {
    type: 'doughnut',
    data: {
        labels: ['Pneus réparés'],
        datasets: [{
            data: [{{ $pneusRepares }}],
            backgroundColor: ['#f59e0b']
        }]
    }
});
</script>
@endsection
