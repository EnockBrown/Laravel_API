<?php

use Illuminate\Database\Seeder;
use App\Models\Payment;

class RequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Payment::class,10)->create();
    }
}
