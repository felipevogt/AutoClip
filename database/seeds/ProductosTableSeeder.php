<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('producto')->insert([
            'codigo_producto'=>'001',
            'stock' => '30',
            'precio_producto_mayor'=>'90',
            'precio_producto' => 90*1.1,
            'marca_vehiculo' => 'Mazda',
            'tipo' => 'Muela',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
    	DB::table('producto')->insert([
            'codigo_producto'=>'002',
            'stock' => '140',
            'precio_producto_mayor'=>'89',
            'precio_producto' => 89*1.1,
            'marca_vehiculo' => 'Audi',
            'tipo' => 'Broche',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
    	DB::table('producto')->insert([
            'codigo_producto'=>'004',
            'stock' => '350',
            'precio_producto_mayor'=>'97',
            'precio_producto' => 97*1.1,
            'marca_vehiculo' => 'Mazda',
            'tipo' => 'Muela',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);        
        DB::table('producto')->insert([
            'codigo_producto' => '008',
            'stock' => '13',
            'precio_producto_mayor'=>'111',
            'precio_producto' => 111*1.1,
            'marca_vehiculo' => 'Mazda',
            'tipo' => 'Sujetador',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
    	DB::table('producto')->insert([
            'codigo_producto'=>'033',
            'stock' => '140',
            'precio_producto_mayor'=>'87',
            'precio_producto' => 87*1.1,
            'marca_vehiculo' => 'Mazda',
            'tipo' => 'Soporte',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
    	DB::table('producto')->insert([
            'codigo_producto'=>'154',
            'stock' => '75',
            'precio_producto_mayor'=>'99',
            'precio_producto' => 99*1.1,
            'marca_vehiculo' => 'Nissan',
            'tipo' => 'Soporte',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
    	DB::table('producto')->insert([
            'codigo_producto'=>'016',
            'stock' => '300',
            'precio_producto_mayor'=>'124',
            'precio_producto' => 124*1.1,
            'marca_vehiculo' => 'Volvo',
            'tipo' => 'Broche',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
    	DB::table('producto')->insert([
            'codigo_producto'=>'300',
            'stock' => '152',
            'precio_producto_mayor'=>'89',
            'precio_producto' => 89*1.1,
            'marca_vehiculo' => 'Suburu',
            'tipo' => 'Sujetador',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
    	DB::table('producto')->insert([
            'codigo_producto'=>'025',
            'stock' => '300',
            'precio_producto_mayor'=>'129',
            'precio_producto' => 129*1.1,
            'marca_vehiculo' => 'Universal',
            'tipo' => 'Broche',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
    	DB::table('producto')->insert([
            'codigo_producto'=>'043',
            'stock' => '152',
            'precio_producto_mayor'=>'103',
            'precio_producto' => 103*1.1,
            'marca_vehiculo' => 'Universal',
            'tipo' => 'Sujetador',
            'ganancia' => 0.1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);
    }
}
