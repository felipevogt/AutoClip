<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table = 'producto';
	protected $primaryKey = 'id';
	protected $fillable = ['codigo_producto','stock','precio_producto_mayor','precio_producto','marca_vehiculo','tipo','ganancia'];
	public $timestamps = true;
	protected $tipo = ['Broche', 'Sujetador','Muela','Soporte'];
	protected $marca_vehiculo = ['Audi', 'Bmw','Hyundai','Ferrari','Fiat','Alfa Romeo','Honda','Land rover','Mazda','Mercedes Benz','Mesarati','Nissan','Suburu','Volvo','Toyota','Universal'];

	public function ventas(){
		return $this->belongsToMany('App\Venta', 'venta_producto')->withPivot('cantidad', 'precio')->withTimestamps();
	}
}