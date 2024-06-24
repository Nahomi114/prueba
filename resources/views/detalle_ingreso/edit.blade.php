<!-- resources/views/detalle_ingreso/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Detalle de Ingreso</div>

                    <div class="card-body">
                        <form action="{{ route('detalle_ingreso.update', $detalleIngreso->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="ID_producto">ID Producto</label>
                                <input type="text" class="form-control" id="ID_producto" name="ID_producto" value="{{ $detalleIngreso->ID_producto }}" required>
                            </div>
                            <div class="form-group">
                                <label for="ID_ingreso">ID Ingreso</label>
                                <input type="text" class="form-control" id="ID_ingreso" name="ID_ingreso" value="{{ $detalleIngreso->ID_ingreso }}" required>
                            </div>
                            <div class="form-group">
                                <label for="cant_det_ingreso">Cantidad</label>
                                <input type="number" class="form-control" id="cant_det_ingreso" name="cant_det_ingreso" value="{{ $detalleIngreso->cant_det_ingreso }}" required>
                            </div>
                            <div class="form-group">
                                <label for="precio_det_ingreso">Precio Unitario</label>
                                <input type="number" step="0.01" class="form-control" id="precio_det_ingreso" name="precio_det_ingreso" value="{{ $detalleIngreso->precio_det_ingreso }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('detalle_ingreso.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
