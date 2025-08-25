<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonte moderna -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f9fbff, #e6f0ff, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #1a1a1a;
        }

        .container {
            text-align: center;
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.08);
            max-width: 450px;
            width: 90%;
        }

        h1 {
            color: #796297ff;
            font-size: 2.2rem;
            margin-bottom: 25px;
            font-weight: 700;
        }

        a {
            display: inline-block;
            padding: 14px 26px;
            background: linear-gradient(135deg, #6a82fb, #56ccf2);
            color: white;
            font-weight: 600;
            border-radius: 12px;
            text-decoration: none;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }

        a:hover {
            transform: translateY(-2px);
            box-shadow: 0px 6px 16px rgba(86, 204, 242, 0.5);
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Bem-vindo!</h1>
        <a href="{{ route('users.create') }}">Cadastrar</a>
    </div>

</body>
</html>
