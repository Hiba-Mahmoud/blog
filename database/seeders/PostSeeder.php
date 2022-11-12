<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0;$i<50;$i++ ){
        Post::create([
            'title'=>$faker->text(20),
            'image'=>$faker->imageUrl(640,480,'cats',true,null,'Facker'),
            'tags'=>$faker->name,
            'content'=>$faker->sentence(),
            'category_id'=>$faker->numberBetween(1,10),
            'user_id'=>$faker->numberBetween(2,100),
            'status'=>$faker->randomElement(['active','pending']),
        ]);
    }
    }
}
