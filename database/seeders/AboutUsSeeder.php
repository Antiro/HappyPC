<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    public function run()
    {
        DB::table('about_us')->insert([
            [   'title' => 'Компьютерная мастерская «HappyPC»',
                'description' => 'Компьютерная мастерская «HappyPC» предлагает профессиональную компьютерную помощь и ремонт компьютеров и ноутбуков в Белогороде. Наши клиенты могут быть уверены в оперативности и высоком качестве выполненных ремонтных работ и установке только качественных комплектующих. Мы не взвинчиваем цены, потому что заинтересованы в расширении круга клиентов, при этом оперативность, аккуратность и профессиональный подход сделали главными принципами своей деятельности.',
                'img' => 'about/pfitl6oaHMs.jpg'],
            [   'title' => 'Нам 4 года',
                'description' => 'Компьютерная мастерская «HappyPC» плодотворно работает с ноября 2018 года. За это время мы произвели обслуживание компьютеров сотни пользователей на самом высоком уровне и получили массу положительных отзывов.',
                'img' => 'about/xvLqkuFikJc.jpg'],
            [   'title' => 'Без компьютеров невозможно',
                'description' => 'Без компьютеров невозможно представить жизнь современного человека, поэтому в случае поломки устройств их владельцы стремятся как можно быстрее привести их в порядок, чтобы вернуться к привычному образу жизни и активной деятельности.',
                'img' => 'about/E3163ZPVhrU.jpg',],
        ]);
    }
}
