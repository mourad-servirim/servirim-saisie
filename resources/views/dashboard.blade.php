<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tableau de bord - Servirim</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="bg-blue-900 text-white w-64 hidden md:flex flex-col shadow-xl">
        <div class="p-6 text-center font-bold text-xl border-b border-blue-700 tracking-wide">
            SERVIRIM
        </div>

        <nav class="flex-1 mt-4 space-y-1">

            <a href="{{ route('dashboard') }}"
               class="flex items-center px-6 py-3 hover:bg-blue-700 transition {{ request()->routeIs('dashboard') ? 'bg-blue-700' : '' }}">
                <i class="bx bx-home text-xl mr-3"></i> Tableau de bord
            </a>

            <a href="{{ route('pointage.index') }}"
               class="flex items-center px-6 py-3 hover:bg-blue-700 transition {{ request()->routeIs('pointage.*') ? 'bg-blue-700' : '' }}">
                <i class="bx bx-user-check text-xl mr-3"></i> Pointage
            </a>

            <a href="{{ route('remarques.index') }}"
               class="flex items-center px-6 py-3 hover:bg-blue-700 transition {{ request()->routeIs('remarques.*') ? 'bg-blue-700' : '' }}">
                <i class="bx bx-note text-xl mr-3"></i> Remarques
            </a>

            <a href="{{ route('stock.index') }}"
               class="flex items-center px-6 py-3 hover:bg-blue-700 transition {{ request()->routeIs('stock.*') ? 'bg-blue-700' : '' }}">
                <i class="bx bx-box text-xl mr-3"></i> Stock
            </a>

            <a href="{{ route('rapports.index') }}"
               class="flex items-center px-6 py-3 hover:bg-blue-700 transition {{ request()->routeIs('rapports.*') ? 'bg-blue-700' : '' }}">
                <i class="bx bx-file text-xl mr-3"></i> Rapports
            </a>

            <a href="{{ route('reparations.index') }}"
               class="flex items-center px-6 py-3 hover:bg-blue-700 transition {{ request()->routeIs('reparations.*') ? 'bg-blue-700' : '' }}">
                <i class="bx bx-wrench text-xl mr-3"></i> Réparations
            </a>

             <a href="{{ route('bulletins.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-600">
                 <i class="bx bx-receipt mr-2 text-xl"></i> BULLETINS
             </a>


        </nav>

        <div class="p-6 border-t border-blue-700">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full bg-red-600 hover:bg-red-700 px-3 py-2 rounded text-white font-semibold flex items-center justify-center">
                    <i class="bx bx-log-out mr-2 text-lg"></i> Déconnexion
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1">

        <!-- Top bar -->
        <header class="bg-white shadow p-4 flex items-center justify-between md:pl-72">
            <div>
                <h1 class="text-2xl font-semibold text-gray-700">Tableau de bord</h1>
                <p class="text-sm text-gray-500">
                    Bienvenue, <span class="font-medium">{{ session('user_name') ?? 'Utilisateur' }}</span>
                    — <span class="capitalize">{{ session('user_role') ?? '' }}</span>
                </p>
            </div>
            <div class="hidden md:block text-sm text-gray-600 font-medium">
                {{ now()->format('d/m/Y H:i') }}
            </div>
        </header>

        <!-- CONTENT -->
        <main class="p-6 md:pl-72 space-y-10">

            <!-- CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Card template -->
                @php
                $cards = [
                    ['route' => 'pointage.index', 'icon' => 'bx-user-check', 'color' => 'blue', 'title' => 'Pointage', 'desc' => 'Saisir les présences.'],
                    ['route' => 'remarques.index', 'icon' => 'bx-note', 'color' => 'yellow', 'title' => 'Remarques', 'desc' => 'Ajouter les remarques.'],
                    ['route' => 'stock.index', 'icon' => 'bx-box', 'color' => 'green', 'title' => 'Stock', 'desc' => 'Gérer les entrées/sorties.'],
                    ['route' => 'rapports.index', 'icon' => 'bx-file', 'color' => 'red', 'title' => 'Rapports', 'desc' => 'Générer les rapports.'],
                    ['route' => 'reparations.index', 'icon' => 'bx-wrench', 'color' => 'purple', 'title' => 'Réparations', 'desc' => 'Saisir les réparations.'],
                ];
                @endphp

                @foreach ($cards as $c)
                <div class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="p-3 rounded-lg bg-{{$c['color']}}-50">
                            <i class="bx {{ $c['icon'] }} text-{{$c['color']}}-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">{{ $c['title'] }}</h3>
                            <p class="text-sm text-gray-500">{{ $c['desc'] }}</p>
                        </div>
                    </div>
                    <a href="{{ route($c['route']) }}"
                       class="inline-block mt-2 px-4 py-2 bg-{{$c['color']}}-600 text-white rounded-lg hover:bg-{{$c['color']}}-700">
                       Accéder
                    </a>
                </div>
                @endforeach

            </div>

            <!-- Widgets -->
            <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow">
                    <h4 class="font-semibold mb-2">Statut rapide</h4>
                    <p class="text-sm text-gray-500">Pointages manquants, stock faible, rapports récents...</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <h4 class="font-semibold mb-2">Actions récentes</h4>
                    <p class="text-sm text-gray-500">Dernières opérations effectuées.</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <h4 class="font-semibold mb-2">Notes internes</h4>
                    <p class="text-sm text-gray-500">Consignes du chef de site ou rappels.</p>
                </div>
            </section>

        </main>
    </div>

</body>
</html>
