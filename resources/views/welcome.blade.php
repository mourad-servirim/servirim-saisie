<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servirim - Bienvenue</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
        }
        .btn-primary {
            background-color: #1d4ed8;
            color: #fff;
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }
        .btn-primary:hover {
            background-color: #2563eb;
        }
        .top-right {
            position: absolute;
            right: 30px;
            top: 20px;
        }
        .top-right a {
            color: #374151;
            text-decoration: none;
            margin-left: 15px;
            font-weight: 500;
        }
        .top-right a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    @if (Route::has('login'))
    <div class="top-right">
        @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            {{-- Register supprimé --}}
        @endauth
    </div>
    @endif

    <div class="card">
        <h1 class="text-4xl font-bold mb-4">Bienvenue chez Servirim</h1>
        <p class="text-lg mb-6">Système de gestion administrative : pointage, stock et rapports hebdomadaires</p>

        @guest
            <p class="mb-4">Veuillez vous connecter pour accéder au tableau de bord :</p>
            <a href="{{ route('login') }}" class="btn-primary">Se connecter</a>
        @endguest
    </div>

</body>
</html>
