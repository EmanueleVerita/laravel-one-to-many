<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 

//models
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::truncate();

        for($i = 0 ; $i < 30 ; $i++){

            $title = substr(fake()->sentence() , 0 , 255);
            $slug = str()->slug($title);
            $content = fake()->paragraph();

            Movie::create([
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
            ]);
        }
    }
}
