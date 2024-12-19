<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersSeeder::class);
         $this->call(ClientsSeeder::class);
         $this->call(RoomsSeeder::class);
         $this->call(BookingsSeeder::class);
         $this->call(PaymentSeeder::class);
    }
}
