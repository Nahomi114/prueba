<!-- resources/views/ingresos/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Ingreso</h1>
    <form action="{{ route('ingresos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ID_proveedores">Proveedor</label>
            <select name="ID_proveedores" class="form-control">
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->ID_proveedores }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Usuario</label>
            <select name="user_id" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_comprob">Tipo Comprobante</label>
            <input type="text" name="tipo_comprob" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="serie_comprob">Serie Comprobante</label>
            <input type="text" name="serie_comprob" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="num_comprob">Número Comprobante</label>
            <input type="text" name="num_comprob" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fec_ingreso">Fecha Ingreso</label>
            <input type="date" name="fec_ingreso" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="impuesto">Impuesto</label>
            <input type="text" name="impuesto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="text" name="total" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection



