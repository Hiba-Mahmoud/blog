<?php

namespace Database\Seeders;

use App\Models\Comment;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0;$i<150;$i++ ){
        Comment::create([
            'name'=>$faker->name,
            'email'=>$faker->email,
            'content'=>$faker->sentence(),
            'post_id'=>$faker->numberBetween(1,50),
        ]);
    }
    }
}
