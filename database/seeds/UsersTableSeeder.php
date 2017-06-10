<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('users')->delete();

    	DB::table('users')->insert([
    		'name' => 'Nidas',
    		'email' => 'leonbm@gmail.com',
    		'password' => bcrypt('secret'),

    		]);

    	factory(User::class, 50)->create();


    	$users = User::all();

    	foreach ($users as $user) {

    		$user->attachRole(Role::inRandomOrder()->first());
    	}

    	// dar admin a Nidas
    	$admin = Role::where('name', 'Admin')->first();
    	$nidas = User::where('name', 'Nidas')->first();
    	$nidas->attachRole($admin);

    }
}
