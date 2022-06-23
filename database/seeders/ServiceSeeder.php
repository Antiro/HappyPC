<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{

    public function run()
    {
        DB::table('services')->insert([
            ['class_id'=>'1','name'=>'Диагностика','description'=>'Установление неисправности, подбор запчастей, описание работ и сроков ремонта. Диагностика оплачивается ТОЛЬКО в случае отказа от ремонта','price'=>'700'],
            ['class_id'=>'1','name'=>'Чистка компьютера','description'=>'Профилактическое обслуживание системного блока персонального компьютера (ПК)','price'=>'800'],
            ['class_id'=>'1','name'=>'Установка оборудования','description'=>'Установка модуля памяти, процессора, блока питания','price'=>'500'],
            ['class_id'=>'1','name'=>'Happy коврик','description'=>'Это коврик выполнен из самых лучших материалов, специально для вас!','price'=>'1000'],
            ['class_id'=>'1','name'=>'Сборка ПК','description'=>'Сборка вашего компьютера.','price'=>'3000'],
            ['class_id'=>'2','name'=>'Ремонт системного блока ПК','description'=>'Компонентный ремонт системного блока персонального компьютера','price'=>'2100'],
            ['class_id'=>'2','name'=>'Ремонт видеокарты','description'=>'Компонентный ремонт видеокарты системного блока ПК','price'=>'2000'],
        ]);
    }
}
