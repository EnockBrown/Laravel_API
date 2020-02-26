<?php

use App\Models\Person;
use App\Models\Product;
use Illuminate\Database\Seeder;

class PersonTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Person::class,50)->create();
    }
}
