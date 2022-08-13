@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <strong>Actualizar Categoría</strong>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                     <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('categorias.update',$categoria)}}" >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="formGroupExampleInput">Nombre de la Categoría</label>
                    <input type="text" class="form-control" value="{{$categoria->nombre}}" name="nombre">
                </div>

                
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
