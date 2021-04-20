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

        \App\Models\Handsign::create([
            'file_title' => 'こんにちは',
            'file_name' => 'こんにちは.jpg',
            'file_path' => 'こんにちは.jpg',
        ]);
        \App\Models\Handsign::create([
            'file_title' => 'ありがとう',
            'file_name' => 'ありがとう.jpg',
            'file_path' => 'ありがとう.jpg',
        ]);
        \App\Models\Handsign::create([
            'file_title' => 'さよなら',
            'file_name' => 'さよなら.jpg',
            'file_path' => 'さよなら.jpg',
        ]);

        \App\Models\Thanks_img::create([
            'file_name' => 'Thanks1',
            'file_path' => 'Thanks1.jpg',
            'file_title' => 'file_titleThanks1.jpg',
        ]);
        \App\Models\Thanks_img::create([
            'file_name' => 'Thanks2',
            'file_path' => 'Thanks2.jpg',
            'file_title' => 'file_titleThanks2.jpg',
        ]);
        \App\Models\Thanks_img::create([
            'file_name' => 'Thanks3',
            'file_path' => 'Thanks3.jpg',
            'file_title' => 'file_titleThanks3.jpg',
        ]);

        \App\Models\Have_img::create([
            'user_id' => '2',
            'img_id' => '1',
        ]);
        \App\Models\Have_img::create([
            'user_id' => '2',
            'img_id' => '2',
        ]);
        \App\Models\Have_img::create([
            'user_id' => '3',
            'img_id' => '1',
        ]);
    }
}
