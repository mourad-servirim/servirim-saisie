<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Connexion - Servirim')</title>

    <!-- ✅ Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Animation CSS (animate.css) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- ✅ Police et style personnalisé -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #004aad, #007bff);
            min-height: 100vh;
            margin: 0;
        }

        .login-card {
            background: #ffffff;
            border-radius: 15px;
            width: 100%;
            max-width: 480px;
        }

        .custom-input {
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .custom-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.4);
        }

        .btn-hover {
            transition: all 0.3s ease-in-out;
        }

        .btn-hover:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .login-container {
            height: 100vh;
        }
    </style>
</head>

<body>
    @yield('content')

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
