<?php

use App\Profile;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	

    	$users = App\User::all();

    	foreach ($users as $user) {

    		if(!Profile::where('user_id', $user->id)->first() ) {

    			factory(App\Profile::class)->create(['user_id'=> $user->id]);    		
    		}
    	}

    }


}

