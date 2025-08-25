@extends('auth.layout')
@section('title','Cadastro')
@section('heading','Crie sua conta')
@section('subtitle','Página 1 — Nome, E-mail e Senha')
@section('content')
<form method="POST" action="{{ route('auth.register.post') }}" class="space-y-4">
  @csrf
  <input class="field" type="text" name="name" placeholder="Seu nome" value="{{ old('name') }}" required>
  <input class="field" type="email" name="email" placeholder="Seu e-mail" value="{{ old('email') }}" required>
  <input class="field" type="password" name="password" placeholder="Crie uma senha" required>
  <button class="btn btn-primary w-full">Cadastrar</button>
</form>
<div class="mt-4 text-center">
  <a class="link" href="{{ route('auth.login') }}">Já tem conta? Entrar</a>
</div>
@endsection
