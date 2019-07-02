<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
	protected $primaryKey = 'id';
	protected $fillable = ['cantidad_productos','costo_envio','costo_productos','costo_total','direccion','pago','cliente_id'];
	public $timestamps = true;


	public function productos(){
		return $this->belongsToMany('App\Producto','venta_producto')->withPivot('cantidad', 'precio')->withTimestamps();
	}
	public function cliente(){
		return $this->belongsTo('App\Cliente');
	}	
}
