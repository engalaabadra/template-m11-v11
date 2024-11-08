<?php

namespace Database\Seeders\Geocode;

use Illuminate\Database\Seeder;
use App\Models\Geocode\State;

/**
 * Class StateTableSeeder.
 */
class StateSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run(): void
    {
        //states Riyadh
        State::create([
            'code' => '13711',
            'name' => 'Diriyah',
            'city_id'=> 1 ,
            'active' => 1
        ]);
        State::create([
            'code' => '11952',
            'name' => 'Majmaah',
            'city_id'=> 1 ,
            'active' => 1
        ]);
        //states Makka
        State::create([
            'code' => '21971',
            'name' => 'Adham',
            'city_id'=> 2 ,
            'active' => 1
        ]);
        State::create([
            'code' => '1444',
            'name' => 'Taif',
            'city_id'=> 2 ,
            'active' => 1
        ]);

    }
}
