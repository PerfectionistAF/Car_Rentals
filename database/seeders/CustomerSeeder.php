<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //factory to add 3 records for example
        //factory cannot work without seeder, opposite is ok
        
        //Customer::factory()->count(1)->create();
        
        //UNCOMMENT FACTORY METHOD

        //Customer::factory()->hasOrders(3)->create();
        Customer::factory()->count(3)->hasOrders(3)->create();

    }
}
