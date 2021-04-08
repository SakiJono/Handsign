<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductionInitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'test@hoge.com',
            'email_verified_at' => null,
            'is_admin' => 1,
            'password' => bcrypt('this is password'),
        ]);
    }
}
