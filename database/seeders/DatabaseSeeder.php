<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        // \App\Models\User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            ExchangeGroupSeeder::class,
            TimeFrameSeeder::class,
            OrderTypeSeeder::class,
            CurrencySeeder::class,
        ]);

        $this->call([ExchangeSeeder::class,]);
        $this->call([AssetSeeder::class]);
        $this->call([NotTradingSeeder::class]);
        $this->call([AdminSeeder::class]);
        $this->call([ApiExchangeSeeder::class]);
    }
}
