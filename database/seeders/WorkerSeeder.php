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
            ['name' => 'Данил', 'description' => 'Текст', 'img' => 'workers/Daniel.jpg'],
            ['name' => 'Иван', 'description' => 'Текст', 'img' => 'workers/Ivan.jpg'],
            ['name' => 'Александр', 'description' => 'Текст', 'img' => 'workers/Alexander.jpg'],
            ['name' => 'Евгения', 'description' => 'Текст', 'img' => 'workers/Zhenya.jpg'],
            ['name' => 'Никита', 'description' => 'Текст', 'img' => 'workers/Nikita_PC.jpg'],
            ['name' => 'Никита', 'description' => 'Текст', 'img' => 'workers/Nikita_Apple.png'],
        ]);
    }
}
