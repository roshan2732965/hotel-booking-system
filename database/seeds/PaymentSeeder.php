<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = [
            ['booking_id' => '1','payment_method' => 'cash','total_payment' => 60, 'total_price' => 60],
        ];

        foreach ($payments as $payment) {
            \App\Payment::create($payment);
        }
    }
}
