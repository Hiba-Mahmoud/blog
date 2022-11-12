<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        User::create([
            'name'=>'Hiba',
            'email'=>'hibamahmudali@gmail.com',
            'email_verified_at'=>now(),
            'password'=>bcrypt('123456789'),
            'role'=>'admin',
        ]);
        $faker = Factory::create();
        for($i = 2;$i<100;$i++ ){
        User::create([
            'name'=>$faker->name,
            'email'=>$faker->email,
            'email_verified_at'=>now(),
            'password'=>bcrypt('123456789'),
            'role'=>'auther',
        ]);
    }
    }
}
