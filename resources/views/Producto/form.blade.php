
@if (count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="mb-3">
    <label for="nombreProducto" class="form-label">Nombre del Producto</label>
    <input type="text" class="form-control" id="nombreProducto" name="nombreProducto" value="{{ isset($producto->nombreProducto) ? $producto->nombreProducto : old("nombreProducto") }}">
</div>

<div class="row justify-content-center align-items-center g-2">
    <div class="col">
        <label for="stock" class="form-label">Cantidad en almacen</label>
        <input type="number" min="0" class="form-control" id="stock" name="stock" value="{{ isset($producto->stock) ? $producto->stock : old("stock") }}">
    </div>

    <div class="col">
        <label for="precioUnitario" class="form-label">Precio Unitario</label>
        <input type="number" step="0.01" min="0" class="form-control" id="precioUnitario" name="precioUnitario" value="{{ isset($producto->precioUnitario) ? $producto->precioUnitario : old("precioUnitario") }}">
    </div>
</div>

<div class="mb-3">
  <label for="descripcion" class="form-label">Descripcion</label>
  <textarea class="form-control" name="descripcion" id="descripcion" name="descripcion" rows="3">{{ isset($producto->descripcion) ? $producto->descripcion : old("descripcion") }}</textarea>
</div>

<button type="submit" class="btn btn-success">{{ $estado }} Producto</button>

<a class="btn btn-primary" href="{{ url("/listaProductos") }}" role="button">Regresar</a>
