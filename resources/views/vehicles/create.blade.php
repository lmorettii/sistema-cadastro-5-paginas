
@extends('layouts.app')

@section('content')
<h1>Novo Veículo</h1>

<form method="POST" action="{{ route('vehicles.store') }}">
    @csrf
    <div class="mb-3"><label>Placa</label><input name="plate" class="form-control" required></div>
    <div class="mb-3"><label>Marca</label><input name="make" class="form-control" required></div>
    <div class="mb-3"><label>Modelo</label><input name="model" class="form-control" required></div>
    <div class="mb-3"><label>Ano</label><input name="year" class="form-control" type="number"></div>
    <div class="mb-3"><label>Diária (R$)</label><input name="daily_rate" class="form-control" type="number" step="0.01" required></div>
    <button class="btn btn-primary">Salvar</button>
</form>
@endsection
