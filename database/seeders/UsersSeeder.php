<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if there are any existing users
        if (User::count() == 0) {
            // Initialize Faker
            $faker = Faker::create();

            // Create 10 random users
            for ($i = 1; $i <= 10; $i++) {
                User::create([
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                ]);
            }
        }
    }
}
