@extends('auth.layout')
@section('title','Logado')
@section('heading','Tudo pronto 🎉')
@section('subtitle','Página 5 — Sessão iniciada')
@section('content')
<div class="text-center space-y-4">
  <p class="text-slate-200">Você está <span class="font-bold text-white">logado</span> como <span class="text-indigo-300">{{ $name }}</span>.</p>
  <p class="text-slate-300">Este layout é único, com efeito glassmorphism e gradientes sutis — clean, diferente e estiloso.</p>
  <form method="POST" action="{{ route('auth.logout') }}">
    @csrf
    <button class="btn btn-ghost">Sair</button>
  </form>
</div>
@endsection
