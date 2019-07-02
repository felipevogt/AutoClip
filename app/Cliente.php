<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'correo', 'telefono'];
    public $timestamps = true;

    public function ventas()
    {
        return $this->hasMany('App\Venta');
    }
}
