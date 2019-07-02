<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad_productos');
            $table->integer('costo_envio');
            $table->integer('costo_productos');
            $table->integer('costo_total');
            $table->string('direccion');
            $table->enum('pago', ['Credito', 'Debito', 'Efectivo', 'Cheque']);
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('venta_producto', function (Blueprint $table) {
            $table->integer('venta_id')->unsigned();
            $table->integer('producto_id')->unsigned();

            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('cascade');
            $table->foreign('venta_id')->references('id')->on('venta')->onDelete('cascade');
            $table->integer('cantidad');
            $table->integer('precio');
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
        Schema::dropIfExists('venta');
    }
}
