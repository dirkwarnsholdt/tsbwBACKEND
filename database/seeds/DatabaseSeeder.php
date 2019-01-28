<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,50) as $index) {
            DB::table('users')->insert([
                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'remember_token' => str_random(10),
                'created_at' => $faker-> dateTime($max = 'now', $timezone = null), 
                'updated_at' => $faker-> dateTime($max = 'now', $timezone = null),
            ]);
        }

        foreach (range(1,50) as $index) {
            DB::table('gallery')->insert([
                'image' => $faker->imageUrl($width = 640, $height = 480),
                'created_at' => $faker-> dateTime($max = 'now', $timezone = null), 
                'updated_at' => $faker-> dateTime($max = 'now', $timezone = null),
            ]);
        }

        foreach (range(1,50) as $index) {
            DB::table('news')->insert([
                'title' => $faker->catchPhrase,
                'content' => $faker->address,
                'edited_by' => '1',
                'created_at' => $faker-> dateTime($max = 'now', $timezone = null), 
                'updated_at' => $faker-> dateTime($max = 'now', $timezone = null),
            ]);
        }

        foreach (range(1,50) as $index) {
            DB::table('offers')->insert([
                'title' => $faker->jobTitle,
                'created_at' => $faker-> dateTime($max = 'now', $timezone = null), 
                'updated_at' => $faker-> dateTime($max = 'now', $timezone = null),
            ]);
        }

        foreach (range(1,50) as $index) {
            DB::table('offer_details')->insert([
                'title' => $faker->state  ,
                'content' => $faker->company,
                'offerid' => $faker->numberBetween($min = 1, $max = 50),
                'edited_by' => $faker->numberBetween($min = 1, $max = 50),
                'created_at' => $faker-> dateTime($max = 'now', $timezone = null), 
                'updated_at' => $faker-> dateTime($max = 'now', $timezone = null),
            ]);
        }

        foreach (range(1,50) as $index) {
            DB::table('people')->insert([
                'title' => $faker->name,
                'content' => $faker->text($maxNbChars = 200),
                'edited_by' => $faker->numberBetween($min = 1, $max = 50), 
                'created_at' => $faker-> dateTime($max = 'now', $timezone = null), 
                'updated_at' => $faker-> dateTime($max = 'now', $timezone = null),
            ]);
        }

        foreach (range(1,50) as $index) {
            DB::table('times')->insert([
                'title' => $faker->bs,
                'content' => $faker->ipv6,
                'edited_by' => $faker->numberBetween($min = 1, $max = 50),
                'created_at' => $faker-> dateTime($max = 'now', $timezone = null), 
                'updated_at' => $faker-> dateTime($max = 'now', $timezone = null),
            ]);
        }
    }    
}

