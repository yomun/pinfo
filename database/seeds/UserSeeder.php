<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        \App\User::create([
            'role_id'        => 2,
            'name'           => 'root',
            'email'          => 'yomun@yahoo.com',
            'password'       => '$2y$10$sXMXhM2.7c4heOwQd1nJQOpbvVj3QLvY71vxAx1jdwxgoHVzko3ma',
            'remember_token' => 'dHzK8j10wkChD6CtLNwe3dNJioP0OukJPdIXCO2xzzimWNbDNULHMamlemSv',
        ]);
    }
}
