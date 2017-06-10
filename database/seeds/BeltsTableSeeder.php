<?php

use Illuminate\Database\Seeder;

class BeltsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('belts')->delete();

    	$colorCode = ['white', 'blue', 'purple', 'brown', 'black'];
    	$colores = ['Blanco', 'Azul', 'Morado', 'Marron', 'Negro'];
    	$grados = ['', 'Primer', 'Segundo', 'Tercer', 'Cuarto'];

    	foreach ($colores as $key => $color) {

    		foreach ($grados as $key2 => $grado) {

    			$name = $color . ' ' . $grado . ' grado.';
    			if($key2 == 0)  $name = $color; 
    			
    			DB::table('belts')->insert([

    				'name' => $name,
    				'gradenumber' => $key2,
    				'gradename' =>	$grados[$key2],
    				'colorname' => $colores[$key],
    				'colorcode' => $colorCode[$key],

    				]);
    		}

    	}

    }

}

