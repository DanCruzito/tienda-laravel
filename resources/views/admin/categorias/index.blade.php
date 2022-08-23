@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="card">
        <div class="card-body">
            <strong>Lista de Categorias</strong>
            <a class="btn btn-success float-right" href="{{ route('categorias.create') }}">
                <i class="fas fa-plus"></i>
                Agregar Categoría
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table" id="categoria">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <th scope="row">{{ $categoria->id }}</th>
                            <td>{{ $categoria->nombre }}</td>
                            @if ($categoria->imagen)
                            <td><img width="50" height="50" src="{{ Storage::url($categoria->imagen) }}" alt="">
                            @else
                            <td><img width="50" height="50" src="{{ asset('img/livewire.png') }}" alt="">   
                            @endif
                            
                            </td>
                            <td>
                                <form action="{{ route('categorias.destroy', $categoria) }}" method="POST"
                                    class="form-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-secondary" href="{{ route('categorias.show', $categoria) }}">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('categorias.edit', $categoria) }}">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <button class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{--Datatable css--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
    {{-- Importamos sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   {{--Mensaje de confirmación de Eliminar--}}
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Eliminado!',
                'La Categoría ha sido eliminada.',
                'success'
            )
        </script>
    @endif
    {{--Mensaje de confirmación de Eliminar--}}
    @if (session('editar') == 'ok')
        <script>
            Swal.fire(
                'Actualizado!',
                'La Categoría ha sido actualizada.',
                'success'
            )
        </script>
    @endif
    {{-- Abre el mensaje de advertencia para eliminar --}}
    <script>
        $('.form-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Los datos de la Categoría, se eliminarán!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    /**Swal.fire(
                          'Eliminado!',
                          'La Categoría ha sido eliminada.',
                          'success'
                      )*/
                    this.submit();
                }
            })
        });
    </script>
    {{--Datatable jS--}}
     <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
  <script>
        $('#categoria').DataTable({
            responsive: true,
            autowidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "El registro no existe - disculpe",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate":{
                    "next":"Siguiente",
                    "previous":"Anterior"
                }
            }
        });
       </script>
    
@stop
