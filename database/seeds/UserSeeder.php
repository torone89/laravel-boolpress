<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = 'francescotovani';
        $user->email = 'francescotovani@hotmail.it';
        $user->password = bcrypt('Ballerina30121989');
        $user->save();

        for ($i = 0; $i < 9; $i++) {
            $user = new User();
            $user->name = $faker->userName();
            $user->email = $faker->email();
            $user->password = bcrypt('password');
            $user->save();
        }
    }
}
