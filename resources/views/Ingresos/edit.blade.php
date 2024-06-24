<!-- resources/views/ingresos/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ingreso</h1>
    <form action="{{ route('ingresos.update', $ingreso->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ID_proveedores">Proveedor</label>
            <select name="ID_proveedores" class="form-control">
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->ID_proveedores }}" {{ $ingreso->ID_proveedores == $proveedor->ID_proveedores ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Usuario</label>
            <select name="user_id" class="form-control">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $ingreso->user_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tipo_comprob">Tipo Comprobante</label>
            <input type="text" name="tipo_comprob" class="form-control" value="{{ $ingreso->tipo_comprob }}" required>
        </div>
        <div class="form-group">
            <label for="serie_comprob">Serie Comprobante</label>
            <input type="text" name="serie_comprob" class="form-control" value="{{ $ingreso->serie_comprob }}" required>
        </div>
        <div class="form-group">
            <label for="num_comprob">Número Comprobante</label>
            <input type="text" name="num_comprob" class="form-control" value="{{ $ingreso->num_comprob }}" required>
        </div>
        <div class="form-group">
            <label for="fec_ingreso">Fecha Ingreso</label>
            <input type="date" name="fec_ingreso" class="form-control" value="{{ $ingreso->fec_ingreso }}" required>
        </div>
        <div class="form-group">
            <label for="impuesto">Impuesto</label>
            <input type="text" name="impuesto" class="form-control" value="{{ $ingreso->impuesto }}" required>
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="text" name="total" class="form-control" value="{{ $ingreso->total }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
