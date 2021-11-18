<?php

namespace Database\Seeders;

use App\Models\ShoeUsage;
use Illuminate\Database\Seeder;

class ShoeUsageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShoeUsage::factory(10)->create();
    }
}
