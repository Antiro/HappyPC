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
            ['name'=>'ГОРОДА РОССИИ','description'=>"Доставка в Республики Беларусь и Казахстан осуществляется службами СДЭК и PonyExpress. Стоимость доставки – от 500 руб. "],
            ['name'=>'БЕЛАРУСЬ И КАЗАХСТАН','description'=>"Доставка в Республики Беларусь и Казахстан осуществляется службами СДЭК и PonyExpress. Стоимость доставки – от 500 руб. "],
        ]);
    }
}
