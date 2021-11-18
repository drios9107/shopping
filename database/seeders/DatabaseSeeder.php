<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('db:wipe');
        Artisan::call('migrate');
        $this->call(Userseeder::class);
        $this->call(UsageSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ShoeSeeder::class);
        $this->call(ShoeUsageSeeder::class);
        $this->call(CartSeeder::class);
    }
}
