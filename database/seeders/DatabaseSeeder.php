<?php

namespace Database\Seeders;

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
        if (\App::environment('local')) {
            $this->call(LocalDevelopSeeder::class); // Local開発用
    
        } elseif (\App::environment('production')) {
            $this->call(ProductionInitSeeder::class); // Production用の初期データ
        }
    }
}
