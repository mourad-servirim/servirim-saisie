<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tableau de bord - Servirim')</title>

    <!-- ✅ Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- ✅ Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- ✅ Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- ✅ Style personnalisé -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f6f9fc;
        }
        .sidebar {
            background: linear-gradient(135deg, #004aad, #007bff);
        }
        .sidebar a {
            transition: all 0.3s ease;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.1);
            border-left: 4px solid #fff;
            padding-left: 1rem;
        }
        .content-area {
            margin-left: 250px;
            padding: 2rem;
        }
    </style>
</head>
<body class="flex">

    <!-- ✅ Sidebar -->
    <aside class="sidebar w-64 min-h-screen text-white p-6 fixed shadow-lg">
        <h2 class="text-2xl font-bold mb-8 flex items-center">
            <i class="bx bx-tire text-3xl mr-2"></i> Servirim
        </h2>
        <nav class="space-y-3">
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-600">
                <i class="bx bx-home mr-2 text-xl"></i> TABLEAU DE BORD
            </a>
            <a href="{{ route('pointage.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-600">
                <i class="bx bx-list-check mr-2 text-xl"></i> POINTAGE
            </a>
            <a href="{{ route('stock.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-600">
                <i class="bx bx-package mr-2 text-xl"></i> STOCK
            </a>
            <a href="{{ route('remarques.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-600">
                <i class="bx bx-comment-dots mr-2 text-xl"></i> PNEUS
            </a>
            <a href="{{ route('rapports.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-600">
                <i class="bx bx-file mr-2 text-xl"></i> RAPPORTS
            </a>
            <a href="{{ route('bulletins.create') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-600">
    <i class="bx bx-receipt mr-2 text-xl"></i> BULLETINS
</a>

        </nav>

        <form action="{{ route('logout') }}" method="POST" class="mt-10">
            @csrf
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded transition">
                <i class="bx bx-log-out mr-1"></i> Déconnexion
            </button>
        </form>
    </aside>

    <!-- ✅ Contenu principal -->
    <main class="content-area w-full">
        <header class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-semibold text-gray-700">@yield('title')</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600"><i class="bx bx-user-circle text-2xl"></i> {{ session('user_name') ?? 'Admin' }}</span>
            </div>
        </header>

        <!-- ✅ Contenu injecté -->
        @yield('content')
    </main>

</body>
</html>


