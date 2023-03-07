@extends('layouts.app')

@section('title','Editar Producto')

@section('content')

    <h1 class="mb-3">Editar Producto</h1>

    <form action="{{ "/actualizarProducto/".$producto->id }}" method="post">

        @csrf

        {{ method_field('PATCH') }}

        @include('Producto.form',['estado' => 'Actualizar'])
    </form>

@endsection