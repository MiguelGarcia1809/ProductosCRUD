<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::paginate(15);
        return view("Producto.index", compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("Producto.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campos = [
            "nombreProducto" => "required|string",
            "descripcion" => "required|string",
            "stock" => "required|numeric",
            "precioUnitario" => "required|numeric"
        ];

        $mensaje = [
            "required" => "El :attribute es obligatorio",
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProducto = request()->except("_token");

        Producto::insert($datosProducto);

        return redirect("/listaProductos")->with("mensaje","Producto agregado con exito.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $producto = Producto::findOrFail($id);
        return view("Producto.edit", compact("producto"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $campos = [
            "nombreProducto" => "required|string",
            "descripcion" => "required|string",
            "stock" => "required|numeric",
            "precioUnitario" => "required|numeric"
        ];

        $mensaje = [
            "required" => "El :attribute es obligatorio",
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProducto = request()->except("_token","_method");

        Producto::where("id", "=", $id)->update($datosProducto);

        return redirect("/listaProductos")->with("mensaje","Producto modificado con exito.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Producto::destroy($id);
        return redirect("/listaProductos")->with("mensaje","Producto Borrado con exito");        
    }
}
