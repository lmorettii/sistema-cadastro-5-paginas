@extends('auth.layout')
@section('title','Editar usuário')
@section('heading','Editar Nome, E-mail ou Senha')
@section('subtitle','Página 4 — Atualize seus dados pelo e-mail cadastr...')
@section('content')
<form method="POST" action="{{ route('auth.edit.post') }}" class="space-y-4">
  @csrf
  <input class="field" type="email" name="email" placeholder="E-mail cadastrado" value="{{ old('email') }}" required>
  <input class="field" type="text" name="name" placeholder="Novo nome (opcional)" value="{{ old('name') }}">
  <input class="field" type="password" name="password" placeholder="Nova senha (opcional)">
  <button class="btn btn-primary w-full">Salvar alterações</button>
</form>
<div class="mt-4 text-center">
  <a class="link" href="{{ route('auth.login') }}">Voltar ao login</a>
</div>
@endsection
