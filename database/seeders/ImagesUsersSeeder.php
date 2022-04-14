<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesUsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('images_of_users')->insert([
            ['img'=>'user1.jpg'],
            ['img'=>'user2.jpg'],
            ['img'=>'user3.jpg'],
            ['img'=>'user4.jpg'],
            ['img'=>'user5.jpg'],
            ['img'=>'user6.jpg'],
            ['img'=>'user7.jpg'],
            ['img'=>'user8.jpg'],
            ['img'=>'user9.jpg'],
            ['img'=>'user10.jpg'],
            ['img'=>'user11.jpg'],
            ['img'=>'user12.jpg'],
            ['img'=>'user13.jpg'],
            ['img'=>'user14.jpg'],
            ['img'=>'user15.jpg'],
        ]);
    }
}
