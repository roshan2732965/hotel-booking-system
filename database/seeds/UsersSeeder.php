<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    public function run()
    {
        $users = [
            ['id'=>1,'name' => 'Admin', 'email' => 'super@admin.com', 'password' => bcrypt('password')],
            ['id'=>2,'name' => 'Test Admin', 'email' => 'test@admin.com', 'password' => bcrypt('password')]
        ];

        foreach ($users as $user) {
            \App\User::create($user);
        }
    }
}
