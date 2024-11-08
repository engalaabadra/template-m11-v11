<?php

namespace Database\Seeders\Geocode;

use Illuminate\Database\Seeder;
use App\Models\Geocode\City;

/**
 * Class CityTableSeeder.
 */
class CitySeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run(): void
    {
        //cities Saudi Arabia
        City::create([
            'code' => '11461',
            'name' => 'Riyadh',
            'country_id'=> 1 ,
            'active' => 1
        ]);
        City::create([
            'code' => '21955',
            'name' => 'Makka',
            'country_id'=> 1 ,
            'active' => 1
        ]);

    }
}
