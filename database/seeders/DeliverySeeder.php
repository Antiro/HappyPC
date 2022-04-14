<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliverySeeder extends Seeder
{

    public function run()
    {
        DB::table('deliveries')->insert([
            ['name'=>'Почта России','description'=>"текст"],
            ['name'=>'CDEK','description'=>"текст"],
        ]);
    }
}
