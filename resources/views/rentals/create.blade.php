
@extends('layouts.app')

@section('content')
<h1>Nova Locação</h1>

<form method="POST" action="{{ route('rentals.store') }}">
    @csrf
    <div class="mb-3">
        <label>Veículo</label>
        <select name="vehicle_id" class="form-control" required>
            <option value="">-- selecione --</option>
            @foreach($vehicles as $v)
                <option value="{{ $v->id }}">{{ $v->plate }} - {{ $v->make }} {{ $v->model }} (R$ {{ number_format($v->daily_rate,2,',','.') }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Cliente</label>
        <select name="customer_id" class="form-control" required>
            <option value="">-- selecione --</option>
            @foreach($customers as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3"><label>Data início</label><input name="start_date" type="date" class="form-control" required></div>
    <div class="mb-3"><label>Data fim</label><input name="end_date" type="date" class="form-control" required></div>
    <button class="btn btn-primary">Registrar locação</button>
</form>
@endsection
