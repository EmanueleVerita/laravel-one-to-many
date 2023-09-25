<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//models
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::truncate();

        for($i = 0 ; $i < 10 ; $i++){

            $title = substr(fake()->sentence() , 0 , 255);
            $slug = str()->slug($title);


            Category::create([

                'title' => $title,
                'slug' => $slug,

            ]);
        }
    }
}
