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
            ['link'=>'https://aerocool.io/ru','img'=>'sponsors/aerocool.png'],
            ['link'=>'https://www.asus.com/ru/laptops/for-home/all-series','img'=>'asponsors/sus.png'],
            ['link'=>'https://www.dell.com/ru-ru','img'=>'sponsors/dell.png'],
            ['link'=>'https://www.gigabyte.ru','img'=>'sponsors/gigabyte.png'],
            ['link'=>'https://www.honor.ru','img'=>'sponsors/honor.png'],
            ['link'=>'https://www.hp.com/ru-ru/home.html','img'=>'sponsors/hp.png'],
            ['link'=>'https://www.kingston.com/ru','img'=>'sponsors/kingston.png'],
            ['link'=>'https://ru.msi.com','img'=>'sponsors/msi.png'],
            ['link'=>'http://eu.palit.com/palit/index.php?lang=ru','img'=>'sponsors/palit.png'],
            ['link'=>'https://zet-gaming.com/','img'=>'sponsors/zet.png'],
        ]);
    }
}
