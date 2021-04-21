<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocalDevelopSeeder extends Seeder
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
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'name' => 'user1',
            'email' => 'test1@hoge.com',
            'email_verified_at' => null,
            'is_admin' => null,
            'password' => bcrypt('password1'),
        ]);
        \App\Models\User::create([
            'name' => 'user2',
            'email' => 'test2@hoge.com',
            'email_verified_at' => null,
            'is_admin' => null,
            'password' => bcrypt('password2'),
        ]);
        \App\Models\User::create([
            'name' => 'user3',
            'email' => 'test3@hoge.com',
            'email_verified_at' => null,
            'is_admin' => null,
            'password' => bcrypt('password3'),
        ]);
        \App\Models\User::create([
            'name' => 'user4',
            'email' => 'test4@hoge.com',
            'email_verified_at' => null,
            'is_admin' => null,
            'password' => bcrypt('password4'),
        ]);

    }
}
