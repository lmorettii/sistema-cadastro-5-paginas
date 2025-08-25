<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula Laravel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 450px;
            background: #eaf4fc; /* Azul claro */
            padding: 20px;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        a {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #3498db;
            font-size: 14px;
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background-color: #3498db;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Cadastrar Usuários</h1>
        <a href="{{ url()->previous() }}">← Voltar</a>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <label for="name">Nome:</label>
            <input type="text" id="name" name="name"
                   placeholder="Digite o seu nome"
                   value="{{ old('name') }}" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email"
                   placeholder="Digite o seu e-mail"
                   value="{{ old('email') }}" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password"
                   placeholder="Digite a sua senha"
                   required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>
</html>