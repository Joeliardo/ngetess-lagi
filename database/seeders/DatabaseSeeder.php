<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('en_EN');

        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make('12345678'),
                'gender' => $faker->randomElement($array = ['Male', 'Female']),
                'hobby' => $faker->randomElement(['music', 'sport', 'dance', 'painting', 'code']),
                'mobile_number' => $faker->phoneNumber(),
                'has_paid' => 1,
                'register_price' => rand(100000, 125000),
                'profile_path' => 'assets/' . $faker->numberBetween(1, 3) . '.jpeg',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('friend_requests')->insert([
                'sender_id' => $faker->numberBetween(1, 10),
                'receiver_id' => $faker->numberBetween(1, 10)
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('friends')->insert([
                'user_id' => $faker->numberBetween(1, 10),
                'friend_id' => $faker->numberBetween(1, 10)
            ]);
        }
    }
}
