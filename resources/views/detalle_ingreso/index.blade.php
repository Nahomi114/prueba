<!-- resources/views/detalle_ingreso/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista de Detalles de Ingreso</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('detalle_ingreso.create') }}" class="btn btn-primary">Agregar Detalle de Ingreso</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Producto</th>
                                    <th>ID Ingreso</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detallesIngreso as $detalle)
                                    <tr>
                                        <td>{{ $detalle->id }}</td>
                                        <td>{{ $detalle->ID_producto }}</td>
                                        <td>{{ $detalle->ID_ingreso }}</td>
                                        <td>{{ $detalle->cant_det_ingreso }}</td>
                                        <td>{{ $detalle->precio_det_ingreso }}</td>
                                        <td>
                                            <a href="{{ route('detalle_ingreso.edit', $detalle->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('detalle_ingreso.destroy', $detalle->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar este detalle de ingreso?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $detallesIngreso->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
