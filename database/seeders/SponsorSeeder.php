<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponsors')->insert([
            ['link'=>'https://aerocool.io/ru','img'=>'aerocool.png'],
            ['link'=>'https://www.asus.com/ru/laptops/for-home/all-series','img'=>'asus.png'],
            ['link'=>'https://www.dell.com/ru-ru','img'=>'dell.png'],
            ['link'=>'https://www.gigabyte.ru','img'=>'gigabyte.png'],
            ['link'=>'https://www.honor.ru','img'=>'honor.png'],
            ['link'=>'https://www.hp.com/ru-ru/home.html','img'=>'hp.png'],
            ['link'=>'https://www.kingston.com/ru','img'=>'kingston.png'],
            ['link'=>'https://ru.msi.com','img'=>'msi.png'],
            ['link'=>'http://eu.palit.com/palit/index.php?lang=ru','img'=>'palit.png'],
            ['link'=>'https://zet-gaming.com/','img'=>'zet.png'],
        ]);
    }
}
