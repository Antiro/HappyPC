<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evaluations')->insert([
            ['name'=>'Like','icon'=>"fa-solid fa-thumbs-up"],
            ['name'=>'Dislike','icon'=>"fa-solid fa-thumbs-down"],
        ]);
    }
}
