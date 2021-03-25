<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\RoleUser;
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
        User::create([
        	'name' => 'administrator',
            'role' => 'administrator',
        	'email' => 'administrator@gmail.com',
        	'password' => bcrypt('password'),
        ]);

        Role::create([
        	'role' => 'administrator',
        ]);

        RoleUser::create([
        	'user_id' => 1,
        	'user_role' => 1,
        ]);
    }
}
