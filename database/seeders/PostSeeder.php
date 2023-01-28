<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $new_post = new Post();
                $new_post->title = $faker->sentence(5);
                $new_post->image = $faker->imageUrl(400, 400, "social", true, 'post', false);
                $new_post->description = $faker->text(1500);
                $new_post->slug = Str::of($new_post->title)->slug('-');
            $new_post->save();
        }
    }
}
