<!-- resources/views/ingresos/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ingresos</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proveedor</th>
                <th>Usuario</th>
                <th>Tipo Comprobante</th>
                <th>Serie</th>
                <th>Número</th>
                <th>Fecha</th>
                <th>Impuesto</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ingresos as $ingreso)
                <tr>
                    <td>{{ $ingreso->id }}</td>
                    <td>{{ $ingreso->proveedor ? $ingreso->proveedor->nombre : 'N/A' }}</td>
                    <td>{{ $ingreso->user ? $ingreso->user->name : 'N/A' }}</td>
                    <td>{{ $ingreso->tipo_comprob }}</td>
                    <td>{{ $ingreso->serie_comprob }}</td>
                    <td>{{ $ingreso->num_comprob }}</td>
                    <td>{{ $ingreso->fec_ingreso }}</td>
                    <td>{{ $ingreso->impuesto }}</td>
                    <td>{{ $ingreso->total }}</td>
                    <td>
                        <a href="{{ route('ingresos.edit', ['ingreso' => $ingreso->id]) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('ingresos.destroy', ['ingreso' => $ingreso->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $ingresos->links() }}
</div>
@endsection

