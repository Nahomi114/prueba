@extends('layouts.app')

@section('content')
    <a href="{{ route('ventas.create') }}">Crear Venta</a>
    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Usuario</th>
                <th>Tipo de Comprobante</th>
                <!-- Otros encabezados según la estructura de tu tabla -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->cliente->nombre }}</td>
                    <td>{{ $venta->user->name }}</td>
                    <td>{{ $venta->tipo_comprobante }}</td>
                    <!-- Otros campos según la estructura de tu tabla -->
                    <td>
                        <a href="{{ route('ventas.edit', $venta->ID_ventas) }}">Editar</a>
                        <form action="{{ route('ventas.destroy', $venta->ID_ventas) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
