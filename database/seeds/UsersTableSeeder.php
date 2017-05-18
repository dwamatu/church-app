<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'churchapp@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
