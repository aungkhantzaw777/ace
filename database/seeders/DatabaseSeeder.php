<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Shop, Coupon};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Shop::factory(10)->create();
        
    }
}
