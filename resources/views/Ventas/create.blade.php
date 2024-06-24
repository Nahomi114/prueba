@extends('layouts.app')

@section('content')
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div>
            <label for="ID_clientes">Cliente</label>
            <select name="ID_clientes" id="ID_clientes">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->ID_clientes }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="user_id">Usuario</label>
            <select name="user_id" id="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="tipo_comprobante">Tipo de Comprobante</label>
            <input type="text" name="tipo_comprobante" id="tipo_comprobante" required>
        </div>
        <!-- Otros campos según la estructura de tu tabla -->
        <button type="submit">Guardar</button>
    </form>
@endsection
