<?php

namespace Database\Seeders;

use App\Models\Purchaser;
use Illuminate\Database\Seeder;

class PurchaserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Purchaser::factory(10)->create();
    }
}
