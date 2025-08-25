
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Locações</h1>
    <a class="btn btn-primary" href="{{ route('rentals.create') }}">Nova locação</a>
</div>

<table class="table table-striped">
    <thead><tr><th>ID</th><th>Veículo</th><th>Cliente</th><th>Período</th><th>Preço</th><th>Status</th><th></th></tr></thead>
    <tbody>
    @foreach($rentals as $r)
        <tr>
            <td>{{ $r->id }}</td>
            <td>{{ $r->vehicle->plate }} - {{ $r->vehicle->make }} {{ $r->vehicle->model }}</td>
            <td>{{ $r->customer->name }}</td>
            <td>{{ $r->start_date }} → {{ $r->end_date }} ({{ $r->total_days }} dias)</td>
            <td>R$ {{ number_format($r->total_price,2,',','.') }}</td>
            <td>{{ $r->status }}</td>
            <td>
                @if($r->status !== 'finished')
                <form action="{{ route('rentals.finish', $r) }}" method="POST" style="display:inline">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-success">Finalizar</button>
                </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
