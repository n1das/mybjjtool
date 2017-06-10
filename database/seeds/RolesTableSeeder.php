<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	 
	 DB::table('roles')->delete();
	 $names = ['Root', 'Admin', 'Profesor', 'Instructor', 'Alumno', 'Ex-Alumno', 'Registrado'];
	 $display_names = ['Root', 'Admin', 'Profesor', 'Instructor', 'Alumno', 'Ex-Alumno', 'Registrado'];

	 foreach ($names as $key => $nombre) {
	 	DB::table('roles')->insert([
	 		'name' => $nombre,
	 		'display_name' => $nombre,

	 		]);
	 }
    }
}
