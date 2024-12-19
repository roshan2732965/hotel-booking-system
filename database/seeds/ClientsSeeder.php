<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{

    public function run()
    {
        $clients = [
            ['name' => 'Ali', 'email' => 'ali@example.com', 'phone' => '+1-202-555-0134', 'image' => 'placeholder.png'],
            ['name' => 'Ryan', 'email' => 'ryan@example.com', 'phone' => '+1-202-555-0199', 'image' => 'placeholder.png'],
            ['name' => 'Ethan', 'email' => 'ethan@example.com', 'phone' => '+1-202-555-0101', 'image' => 'placeholder.png'],
            ['name' => 'customer', 'email' => 'customer@customer.com', 'phone' => '+1-202-555-0111', 'image' => 'placeholder.png'],

        ];

        foreach ($clients as $client) {
            \App\Client::create($client);
        }
    }
}
