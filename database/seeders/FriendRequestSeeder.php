<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FriendRequest;
use Faker\Factory as Faker;

class FriendRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('en_EN');
        $friend_requests = FriendRequest::all();
        for ($i = 0; $i < 10; $i++) {
                FriendRequest::create([
                    'sender_id' => $faker->numberBetween(1, 10),
                    'receiver_id' => $faker->numberBetween(1, 10)
                ]);
            }
    }
}
