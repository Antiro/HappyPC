<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSeeder extends Seeder
{
    public function run()
    {
        DB::table('workers')->insert([
            ['name' => 'Данил', 'description' => 'Текст', 'img' => 'Daniel.jpg'],
            ['name' => 'Иван', 'description' => 'Текст', 'img' => 'Ivan.jpg'],
            ['name' => 'Александр', 'description' => 'Текст', 'img' => 'Alexander.jpg'],
            ['name' => 'Евгения', 'description' => 'Текст', 'img' => 'Zhenya.jpg'],
            ['name' => 'Никита', 'description' => 'Текст', 'img' => 'Nikita_PC.jpg'],
            ['name' => 'Никита', 'description' => 'Текст', 'img' => 'Nikita_Apple.png'],
        ]);
    }
}
