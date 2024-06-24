<!-- resources/views/proveedores/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista de Proveedores</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Agregar Proveedor</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>RUC</th>
                                    <th>Teléfono</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                    <tr>
                                        <td>{{ $proveedor->ID_proveedores }}</td>
                                        <td>{{ $proveedor->Nom_proveedores }}</td>
                                        <td>{{ $proveedor->RUC_proveedores }}</td>
                                        <td>{{ $proveedor->Telf_proveedores }}</td>
                                        <td>{{ $proveedor->Correo_proveedores }}</td>
                                        <td>
                                            <a href="{{ route('proveedores.edit', $proveedor->ID_proveedores) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('proveedores.destroy', $proveedor->ID_proveedores) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar este proveedor?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $proveedores->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

