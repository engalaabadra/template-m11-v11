<?php

namespace Database\Seeders\Geocode;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class GeocodeDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        Model::unguard();

        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(AreaSeeder::class);
    }
}
