<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_producto',3)->unique();  
            $table->integer('stock');
            $table->integer('precio_producto_mayor');
            $table->integer('precio_producto');
            $table->double('ganancia');
            $table->enum('marca_vehiculo',['Audi','Bmw','Hyundai','Ferrari','Fiat','Alfa Romeo','Honda','Land rover','Mazda','Mercedes Benz','Mesarati','Nissan','Suburu','Volvo','Toyota','Universal']);
            $table->enum('tipo',['Broche','Sujetador','Muela','Soporte']);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
