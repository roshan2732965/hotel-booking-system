<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    public function run()
    {
        $users = [
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('password')],
            ['name' => 'Admin', 'email' => 'super@admin.com', 'password' => bcrypt('password')],
            ['name' => 'Praveen', 'email' => 'praveen@admin.com', 'password' => bcrypt('password')]
        ];

        foreach ($users as $user) {
            \App\User::create($user);
        }
    }
}
