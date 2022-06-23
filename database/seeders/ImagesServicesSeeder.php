<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesServicesSeeder extends Seeder
{
    public function run()
    {
        DB::table('images_of_services')->insert([
            ['img'=>'default.jpg','service_id'=>'1'],
            ['img'=>'default.jpg','service_id'=>'2'],
            ['img'=>'default.jpg','service_id'=>'3'],
            ['img'=>'default.jpg','service_id'=>'4'],
            ['img'=>'default.jpg','service_id'=>'5'],
            ['img'=>'default.jpg','service_id'=>'6'],
            ['img'=>'default.jpg','service_id'=>'7'],
        ]);
    }
}
