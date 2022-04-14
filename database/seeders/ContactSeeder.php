<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            ['name' => 'YouTube','icon'=>'fa-brands fa-youtube', 'link' => 'https://www.youtube.com/channel/UCrLQp0ZbiCzCbVfZDXT0Uzw?'],
            ['name' => 'VK','icon'=>'fa-brands fa-vk', 'link' => 'https://vk.com/happy_pc'],
            ['name' => 'Telegram','icon'=>'fa-brands fa-telegram', 'link' => 'https://t.me/happypc'],
            ['name' => 'Instagram','icon'=>'fa-brands fa-instagram-square', 'link' => 'https://www.instagram.com/happypc_belgorod'],
            ['name' => 'Форум','icon'=>'fa-solid fa-users', 'link' => 'https://bitgid.net'],
            ['name' => 'Donat','icon'=>'fa-solid fa-circle-dollar-to-slot', 'link' => 'https://www.donationalerts.com/r/daniil_gerasimov'],
        ]);
    }
}
