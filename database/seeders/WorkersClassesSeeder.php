<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkersClassesSeeder extends Seeder
{
    public function run()
    {
        DB::table('workers_classes')->insert([
            ['worker_id' => '1', 'class_id' => '1'],
            ['worker_id' => '1', 'class_id' => '2'],
            ['worker_id' => '2', 'class_id' => '2'],
            ['worker_id' => '3', 'class_id' => '2'],
            ['worker_id' => '4', 'class_id' => '2'],
            ['worker_id' => '5', 'class_id' => '1'],
            ['worker_id' => '6', 'class_id' => '2'],
        ]);
    }
}
