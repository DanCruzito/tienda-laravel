@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   <div class="card">
      <div class="card-body">
        <strong>Datos de la Categoría:</strong>
        {{$categoria->nombre}}
      </div>
   </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">{{ $categoria->id }}</th>
                            <td>{{ $categoria->nombre }}</td>
                            <td><img width="50" height="50" src="{{ asset('/img/livewire.png') }}" alt="">
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" colspan="5">Productos</th>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoria->productos as $producto)
                    <tr>
                        <th scope="row">{{ $producto->id }}</th>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->precio }} Bs.</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop