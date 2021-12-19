<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Galery;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Galery::factory(30)->create();
        \App\Models\Category::factory(30)->create();

            // User::create([
            //     'name'=>'Nuria Sisma Putri',
            //     'email'=>'putrinuria67@gmail.com',
            //     'password'=>bcrypt('12345678'),
            // ]);

            // Galery::create([
            //     'user_id' => 1,
            //     'tittle' => 'Nuria',
            //     'media' => '/images/DSC_0142.JPG',
            //  ]);

            //  Galery::create([
            //     'user_id' => 2,
            //     'tittle' => 'Putri',
            //     'media' => '/images/DSC_0142.JPG',
            //  ]);

            //  Galery::create([
            //     'user_id' => 3,
            //     'tittle' => 'Nuria Sisma Putri',
            //     'media' => '/images/DSC_0142.JPG',
            //  ]);

            //  Galery::create([
            //     'user_id' => 4,
            //     'tittle' => 'Nuria Putri',
            //     'media' => '/images/DSC_0142.JPG',
            //  ]);

            //  Galery::create([
            //     'user_id' => 5,
            //     'tittle' => 'Nuria S Putri',
            //     'media' => '/images/DSC_0142.JPG',
            //  ]);

            // Category::create([
            //     'category_name' => 'Business & Marketing',
            //     'description' => 'Business % Marketing',
            //  ]);

            // Category::create([
            //     'category_name' => 'Healthy',
            //     'description' => 'Healthy',
            //  ]);

            // Category::create([
            //     'category_name' => 'News',
            //     'description' => 'News',
            //  ]);

            // Category::create([
            //     'category_name' => 'Education',
            //     'description' => 'Education',
            //  ]);
    
    }

}
