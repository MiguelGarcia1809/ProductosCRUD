@extends('layouts.app')

@section('title','Agregar Producto')

@section('content')

    <h1 class="mb-3">Agregar Producto</h1>

    <form action="{{ url("/guardarProducto") }}" method="post">
        @csrf

        @include('Producto.form',['estado' => 'Agregar'])
    </form>

@endsection