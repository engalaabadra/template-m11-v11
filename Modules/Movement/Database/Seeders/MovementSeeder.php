<?php

namespace Modules\Movement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Movement\Entities\Movement;
/**
 * Class MovementTableSeeder.
 */
class MovementSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run(): void
    {
        Movement::create([
            'user_id' => 3,
            'doctor_id' => 4
        ]);
    }
}
