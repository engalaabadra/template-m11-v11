<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
/**
 * Class ReviewTableSeeder.
 */
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run(): void
    {
        //users:3,4,5,6
        //doctors:7,8,9,10,11
        // Review::create([
        //     'user_id' => 3,
        //     'doctor_id' => 11,
        //     'rating' => 5.0
        // ]);
        // Review::create([
        //     'user_id' => 4,
        //     'doctor_id' => 8,
        //     'rating' => 3.5
        // ]);
        // Review::create([
        //     'user_id' => 4,
        //     'doctor_id' => 9,
        //     'rating' => 4.0
        // ]);
        // Review::create([
        //     'user_id' => 5,
        //     'doctor_id' => 10,
        //     'rating' => 4.0
        // ]);

        // Review::create([
        //     'user_id' => 5,
        //     'doctor_id' => 11,
        //     'rating' => 5.0
        // ]);
        // Review::create([
        //     'user_id' => 6,
        //     'doctor_id' => 8,
        //     'rating' => 2.5
        // ]);
        // Review::create([
        //     'user_id' => 6,
        //     'doctor_id' => 7,
        //     'rating' => 4.5
        // ]);
        // Review::create([
        //     'user_id' => 5,
        //     'doctor_id' => 7,
        //     'rating' => 3.0
        // ]);
    }
}
