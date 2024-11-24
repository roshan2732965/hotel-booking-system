<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{

    public function run()
    {
        $users = [
            ['name' => 'Alex', 'email' => 'alex@mail.com', 'password' => bcrypt('secret')],
            ['name' => 'Javed', 'email' => 'javed@mail.com', 'password' => bcrypt('secret')],
            ['name' => 'Admin', 'email' => 'super@admin.com', 'password' => bcrypt('password')],
            ['name' => 'Praveen', 'email' => 'praveen@admin.com', 'password' => bcrypt('password')]


        ];

        foreach ($users as $user) {
            \App\User::create($user);
        }
    }
}
