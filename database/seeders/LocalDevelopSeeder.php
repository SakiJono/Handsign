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
            'handsign_name' => 'こんにちは',
            'handsign_img' => 'こんにちは.jpg',
        ]);
        \App\Models\Handsign::create([
            'handsign_name' => 'ありがとう',
            'handsign_img' => 'ありがとう.jpg',
        ]);
        \App\Models\Handsign::create([
            'handsign_name' => 'さよなら',
            'handsign_img' => 'さよなら.jpg',
        ]);

        \App\Models\Thanks_img::create([
            'img_name' => 'Thanks1',
            'img_file' => 'Thanks1.jpg',
        ]);
        \App\Models\Thanks_img::create([
            'img_name' => 'Thanks2',
            'img_file' => 'Thanks2.jpg',
        ]);
        \App\Models\Thanks_img::create([
            'img_name' => 'Thanks3',
            'img_file' => 'Thanks3.jpg',
        ]);

        \App\Models\Video::create([
            'user_id' => '2',
            'handsign_id' => '1',
            'video_file' => 'video1.mov',
        ]);
        \App\Models\Video::create([
            'user_id' => '2',
            'handsign_id' => '3',
            'video_file' => 'video2.mov',
        ]);
        \App\Models\Video::create([
            'user_id' => '3',
            'handsign_id' => '1',
            'video_file' => 'video3.mov',
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
