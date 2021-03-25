<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(User::class, 3)->create();
        User::create([
        	'name' => Str::random(20),
        	'email' => Str::random(10) . '@gmail.com',
        	'password' => bcrypt('password')
        ]);
    }
}
