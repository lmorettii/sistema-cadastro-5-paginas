@extends('auth.layout')
@section('title','Login')
@section('heading','Bem-vindo de volta')
@section('subtitle','Página 2 — E-mail e Senha')
@section('content')
<form method="POST" action="{{ route('auth.login.post') }}" class="space-y-4">
  @csrf
  <input class="field" type="email" name="email" placeholder="Seu e-mail" value="{{ old('email') }}" required>
  <input class="field" type="password" name="password" placeholder="Sua senha" required>
  <div class="flex items-center justify-between">
    <a class="link" href="{{ route('auth.forgot') }}">Esqueceu a senha?</a>
    <button class="btn btn-primary">Entrar</button>
  </div>
</form>
<div class="mt-4 text-center">
  <a class="link" href="{{ route('auth.register') }}">Criar conta</a>
</div>
@endsection
