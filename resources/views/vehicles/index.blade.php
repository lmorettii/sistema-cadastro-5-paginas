
@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Veículos</h1>
    <a class="btn btn-primary" href="{{ route('vehicles.create') }}">Novo veículo</a>
</div>

<table class="table table-striped">
    <thead><tr><th>Placa</th><th>Modelo</th><th>Ano</th><th>Diária</th><th>Status</th><th></th></tr></thead>
    <tbody>
    @foreach($vehicles as $v)
        <tr>
            <td>{{ $v->plate }}</td>
            <td>{{ $v->make }} {{ $v->model }}</td>
            <td>{{ $v->year }}</td>
            <td>R$ {{ number_format($v->daily_rate,2,',','.') }}</td>
            <td>{{ $v->status }}</td>
            <td>
                <a href="{{ route('vehicles.edit', $v) }}" class="btn btn-sm btn-secondary">Editar</a>
                <form action="{{ route('vehicles.destroy', $v) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Remover?')">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
