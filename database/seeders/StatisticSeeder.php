<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatisticSeeder extends Seeder
{
    public function run()
    {
        DB::table('statistics')->insert([
            ['description'=>'заявок','statistic'=>'231','icon'=>'ti-pencil-alt'],
            ['description'=>'выполненных заказов','statistic'=>'3212','icon'=>'ti-user'],
            ['description'=>'отправленных заказов','statistic'=>'325','icon'=>'ti-dropbox'],
        ]);
    }
}
