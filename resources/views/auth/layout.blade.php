<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Sistema Único')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --bg: radial-gradient(1200px 600px at 10% 10%, rgba(59,130,246,0.15), transparent),
            radial-gradient(1000px 500px at 90% 20%, rgba(236,72,153,0.15), transparent),
            radial-gradient(900px 500px at 50% 100%, rgba(34,197,94,0.15), transparent);
    }
    body { background: var(--bg), #0b1020; }
    .glass { background: rgba(255,255,255,0.06); backdrop-filter: blur(12px); }
    .btn { @apply rounded-2xl px-4 py-2 font-semibold transition hover:scale-[1.02]; }
    .btn-primary { @apply bg-indigo-500 text-white hover:bg-indigo-400; }
    .btn-ghost { @apply text-slate-300 hover:text-white; }
    .field { @apply w-full bg-white/5 border border-white/10 rounded-2xl px-4 py-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-indigo-500; }
    .title { @apply text-white text-3xl font-bold; }
    .card { @apply glass rounded-3xl p-8 shadow-2xl border border-white/10; }
    .link { @apply underline text-indigo-300 hover:text-white; }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
  <div class="w-full max-w-md">
    <div class="mb-6 text-center">
      <h1 class="title">@yield('heading', 'Bem-vindo')</h1>
      <p class="text-slate-300">@yield('subtitle')</p>
    </div>
    <div class="card">
      @if ($errors->any())
        <div class="mb-4 rounded-xl bg-rose-500/20 border border-rose-400/30 p-3 text-rose-200">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @if (session('status'))
        <div class="mb-4 rounded-xl bg-emerald-500/20 border border-emerald-400/30 p-3 text-emerald-200">
          {{ session('status') }}
        </div>
      @endif
      @yield('content')
    </div>
    <div class="mt-6 text-center text-slate-400">
      <a href="{{ route('auth.login') }}" class="link">Login</a> ·
      <a href="{{ route('auth.register') }}" class="link">Cadastro</a> ·
      <a href="{{ route('auth.edit') }}" class="link">Editar</a>
    </div>
  </div>
</body>
</html>
