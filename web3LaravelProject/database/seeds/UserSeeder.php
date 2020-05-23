<?php

use Illuminate\Database\Seeder;
use \App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1, 10) as $index){
            User::create([
                'first_name' => $faker->first_name,
                'password' => Hash::make('password'),
                'email' => $faker->email
            ]);
        }
    }
}
