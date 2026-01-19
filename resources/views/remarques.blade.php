@extends('layouts.dashboard')

@section('title', 'Remarques & Consignes – Servirim')

@section('content')
<div class="p-8 bg-white rounded-2xl shadow-md space-y-8">

    <!-- TITRE -->
    <div>
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
            🛞 Remarques & Manuel d’utilisation – Pneumatiques
        </h2>
        <p class="text-gray-500 mt-2">
            Document interne – Servirim | Maintenance et réparation des pneus
        </p>
    </div>

    <!-- SECTION 1 -->
    <div class="border-l-4 border-blue-600 bg-blue-50 p-6 rounded-lg">
        <h3 class="text-xl font-semibold text-blue-800 mb-2">
            📘 Manuel d’utilisation – Réparation pneumatique
        </h3>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <li>Toute réparation doit être effectuée par un technicien qualifié.</li>
            <li>Les pneus doivent être inspectés visuellement avant toute intervention.</li>
            <li>Les dimensions, références et types de pneus doivent être correctement identifiés.</li>
            <li>Respect strict des procédures de réparation (flanc, bande de roulement, talon).</li>
        </ul>
    </div>

    <!-- SECTION 2 -->
    <div class="border-l-4 border-yellow-500 bg-yellow-50 p-6 rounded-lg">
        <h3 class="text-xl font-semibold text-yellow-800 mb-2">
            ⚠️ Consignes de sécurité – ATTENTION
        </h3>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <li>Ne jamais réparer un pneu présentant une déformation structurelle grave.</li>
            <li>Port obligatoire des équipements de protection (gants, lunettes, chaussures).</li>
            <li>Interdiction de gonflage excessif après réparation.</li>
            <li>Tout pneu douteux doit être signalé au chef d’équipe.</li>
        </ul>
    </div>

    <!-- SECTION 3 -->
    <div class="border-l-4 border-green-600 bg-green-50 p-6 rounded-lg">
        <h3 class="text-xl font-semibold text-green-800 mb-2">
            ℹ️ Informations générales sur les pneus
        </h3>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <li>Un pneu bien entretenu augmente la durée de vie du véhicule.</li>
            <li>La pression correcte réduit les risques d’accident et d’usure prématurée.</li>
            <li>Les réparations doivent respecter les normes internationales.</li>
            <li>La traçabilité des réparations est obligatoire (date, type, durée).</li>
        </ul>
    </div>

    <!-- SECTION 4 -->
    <div class="border-l-4 border-red-600 bg-red-50 p-6 rounded-lg">
        <h3 class="text-xl font-semibold text-red-800 mb-2">
            🔧 Séparation pneumatique & bonnes pratiques
        </h3>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
            <li>Respecter la séparation entre pneus réparables et non réparables.</li>
            <li>Stocker les pneus réparés dans un espace propre et identifié.</li>
            <li>Éviter tout contact avec des substances chimiques non contrôlées.</li>
            <li>Signaler immédiatement toute anomalie constatée.</li>
        </ul>
    </div>

    <!-- FOOTER -->
    <div class="text-sm text-gray-500 text-center border-t pt-4">
        Document interne Servirim – Usage professionnel uniquement
    </div>

</div>
@endsection
