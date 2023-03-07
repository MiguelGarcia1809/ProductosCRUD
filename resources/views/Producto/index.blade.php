
@extends('layouts.app')

@section('title','ListaProductos')
    
@section('content')
    <h1>Lista de Productos</h1>

    @if (Session::has("mensaje"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get("mensaje") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a class="btn btn-success" href="{{ url("/agregarProducto") }}" role="button">Agregar Producto</a>
    <table class="table text-center align-middle mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre del Producto</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad en Almacen</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $p)
                <tr>
                    <th scope="row">{{$p->id}}</tdh>
                    <td>{{$p->nombreProducto}}</td>
                    <td>{{$p->descripcion}}</td>
                    <td>{{$p->stock}}</td>
                    <td>{{$p->precioUnitario}}</td>
                    <td>
                        <a href="{{ url("/editarProducto/".$p->id) }}" title="Editar" class="btn btn-warning mb-2"><i class="fa fa-pencil"></i></a>
                        
                        <form action="{{ "/eliminarProducto/".$p->id }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button title="Borrar" class="btn btn-danger d-inline" onclick="return confirm('¿Desea eliminar el producto?')" ><i class="fa fa-trash"></i></button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $productos->links() }}

@endsection