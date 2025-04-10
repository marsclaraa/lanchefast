<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
 
    <!-- Fontes Google -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Rock+Salt&display=swap" rel="stylesheet">
    
    <!-- Estilo Customizado -->
    <style>
        body {
            font-family: 'Rock Salt', cursive;
            background-image: url('/images/vintage-background.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .header {
            font-family: 'Pacifico', cursive;
            font-size: 3em;
            color: #FF6347;
            text-align: center;
            margin-bottom: 20px;
        }

        .cadastro {
            font-family: 'Rock Salt';
            font-size: 1em;
            color: black;
            text-align: center;
            margin-bottom: 10px;
        }

        .form-control {
            border-radius: 15px;
            padding: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn {
            background-color: #FF6347;
            color: #fff;
            border-radius: 20px;
            padding: 10px 20px;
        }

        .btn:hover {
            background-color: #ff4500;
            color: #fff;
        }

        .message {
            font-size: 1.2em;
            margin-top: 20px;
            text-align: center;
            color: #28a745;
        }

        .error-message {
            color: #dc3545;
        }
    </style>
</head>


<body>
    {{ $slot }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <!-- Tailwind CSS (opcional, para algumas classes utilitárias) -->
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
