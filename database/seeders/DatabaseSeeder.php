<?php

namespace Database\Seeders;
use App\Models\Application;
use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
//      Seeders
        $this->call(RoleSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(WorkerSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(SponsorSeeder::class);
        $this->call(AboutUsSeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(StatisticSeeder::class);
        $this->call(EvaluationSeeder::class);
        $this->call(ImagesUsersSeeder::class);
        $this->call(WorkersClassesSeeder::class);

        //Factories
        User::factory(50)->create();
        Service::factory(10)->create();
        Review::factory(50)->create();
        Application::factory(70)->create();

//        AboutUs::factory(3)->create();
    }
}
