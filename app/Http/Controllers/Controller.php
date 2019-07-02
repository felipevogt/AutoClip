<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Khill\Lavacharts\Lavacharts;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index()
    {
        $lava = new Lavacharts;

        $ventaMes = DB::table("venta")
            ->select("*", DB::raw('SUM(costo_total) as total'))
            ->whereYear('created_at', date('Y'))
            ->orderBy('created_at')
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->get();

        $reasons = \Lava::DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Ventas');

        foreach ($ventaMes as $mes){
            $reasons->addRow(array(date("F",strtotime($mes->created_at)), $mes->total));
        }

        $columnChart = \Lava::ColumnChart('IMDB', $reasons);
        $totalVentas = DB::table('venta')
            ->sum('costo_total');
        $ventasMensuales = DB::table('venta')
            ->whereMonth('created_at', date('m'))
            ->sum('costo_total');
        $ventasAnuales = DB::table('venta')
            ->whereYear('created_at', date('Y'))
            ->sum('costo_total');


        return view('admin.home', ['totalVentas' => $totalVentas, 'ventasMensuales' => $ventasMensuales, 'ventasAnuales' => $ventasAnuales, 'lava' => $lava]);

    }

    public function shop()
    {
        return view('ventas.store');
    }

}
