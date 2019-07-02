<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Cliente;
use App\Producto;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('admin.ventas.listarVentas', ['ventas' => $ventas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('admin.ventas.agregarVenta', ['clientes' => $clientes, 'productos' => $productos]);
    }

    public function generarPagos(Request $request)
    {
        $pago = DB::select(DB::raw('SHOW COLUMNS FROM venta WHERE Field = "pago"'))[0]->Type;
        $h = preg_match("/^enum\(\'(.*)\'\)$/", $pago, $matches);
        $array = array();
        foreach (explode(',', $matches[1]) as $item => $value) {
            $v = trim($value, "'");
            $array = array_add($array, $item, $v);
        }
        if ($request->ajax()) {
            return response()->json($array);
        }
    }

    public function buscarVenta(Request $request)
    {
        $table = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'autoclip' AND TABLE_NAME = 'venta'");
        if ($request->ajax() && !empty($table)) {
            return response()->json($table[0]->AUTO_INCREMENT);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->ajax()) {
            Venta::create($request->get('venta'));
            $venta = Venta::all()->last();
            $productos = $request->get('productos');

            foreach ($productos as $value) {
                $prod = Producto::find($value['producto_id']);
                $venta->productos()->attach($value['producto_id'], ['cantidad' => $value['cantidad'], 'precio' => $value['precio']]);
                $prod->stock = $prod->stock - $value['cantidad'];
                $prod->save();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $venta = Venta::with('productos')->with('cliente')->find($request->id);
        return view('admin.ventas.detalleVenta', ['venta' => $venta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//
    }
}
