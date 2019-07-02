<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('admin.inventario.listaProductos', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tipo = DB::select(DB::raw('SHOW COLUMNS FROM producto WHERE Field = "tipo"'))[0]->Type;
        $marca = DB::select(DB::raw('SHOW COLUMNS FROM producto WHERE Field = "marca_vehiculo"'))[0]->Type;
        $marcas = $this->generarArray($marca);
        $tipos = $this->generarArray($tipo);
        return view('admin.inventario.formIngresarProducto', ['tipos' => $tipos, 'marcas' => $marcas]);
    }

    public function generarArray($enum)
    {

        $h = preg_match("/^enum\(\'(.*)\'\)$/", $enum, $matches);
        $array = array();
        foreach (explode(',', $matches[1]) as $item => $value) {
            $v = trim($value, "'");
            $array = array_add($array, $item, $v);
        }
        return $array;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $porcentaje = $request->input('ganancia') + 1;
        $producto = new Producto();
        $producto->codigo_producto = $request->input('codigo_producto');
        $producto->stock = $request->input('stock');
        $producto->precio_producto_mayor = $request->input('precio_producto_mayor');
        $producto->precio_producto = $producto->precio_producto_mayor * $porcentaje;
        $producto->marca_vehiculo = $request->input('marca_vehiculo');
        $producto->tipo = $request->input('tipo');
        $producto->ganancia = $request->input('ganancia');
        $producto->save();
        return redirect('listarProductos');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $producto = Producto::find($request->id);
        return view('verProducto', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $tipo = DB::select(DB::raw('SHOW COLUMNS FROM producto WHERE Field = "tipo"'))[0]->Type;
        $marca = DB::select(DB::raw('SHOW COLUMNS FROM producto WHERE Field = "marca_vehiculo"'))[0]->Type;
        $marcas = $this->generarArray($marca);
        $tipos = $this->generarArray($tipo);
        $producto = Producto::find($request->producto);
        return view('admin.inventario.formModificarProducto', ['tipos' => $tipos, 'marcas' => $marcas, 'producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $producto = Producto::find($request->id);
        $porcentaje = $request->input('ganancia') + 1;
        $producto->codigo_producto = $request->input('codigo_producto');
        $producto->stock = $request->input('stock');
        $producto->precio_producto_mayor = $request->input('precio_producto_mayor');
        $producto->precio_producto = $producto->precio_producto_mayor * $porcentaje;
        $producto->marca_vehiculo = $request->input('marca_vehiculo');
        $producto->tipo = $request->input('tipo');
        $producto->ganancia = $request->input('ganancia');
        $producto->save();
        return redirect('listarProductos');
    }

    public function updateStock(Request $request)
    {
        $producto = Producto::find($request->producto);
        $cantFinal = $producto->stock + $request->input('stock');

        $producto->stock = $cantFinal;
        $producto->save();

        return redirect('listarProductos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $producto = Producto::findOrFail($request->producto);
        $producto->delete();
        return redirect('listarProductos');
    }

    public function listar(Request $request)
    {
        $productos = Producto::all();
        if ($request->ajax()) {
            return response()->json($productos);
        }
    }
}
