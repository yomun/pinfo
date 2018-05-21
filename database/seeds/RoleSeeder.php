<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->delete();

        \App\Role::create(['role_name' => 'Normal',]);
        \App\Role::create(['role_name' => 'Administrator',]);
    }
}
