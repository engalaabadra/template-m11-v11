<?php

namespace Database\Seeders\Geocode;

use Illuminate\Database\Seeder;
use App\Models\Geocode\Area;

/**
 * Class AreaTableSeeder.
 */
class AreaSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run(): void
    {
        //Areas  in state : Diriyah
        Area::create([
            'code' => '12572',
            'name' => 'Shuhada',
            'state_id'=> 1 ,
            'active' => 1
        ]);
        Area::create([
            'code' => '13712',
            'name' => 'Al faisaliyah',
            'state_id'=> 1 ,
            'active' => 1
        ]);
        //Areas in state Majmaah
        Area::create([
            'code' => '15772',
            'name' => 'Jarab',
            'state_id'=> 2 ,
            'active' => 1
        ]);
        Area::create([
            'code' => '15315',
            'name' => 'Tameer',
            'state_id'=> 2 ,
            'active' => 1
        ]);
        //areas in state Adham
        Area::create([
            'code' => '28653',
            'name' => 'Hospital',
            'state_id'=> 3 ,
            'active' => 1
        ]);
        Area::create([
            'code' => '28674',
            'name' => 'Prize',
            'state_id'=> 3 ,
            'active' => 1
        ]);

        //areas in state Taif
        Area::create([
            'code' => '26523',
            'name' => 'Jabra',
            'state_id'=> 4 ,
            'active' => 1
        ]);
        Area::create([
            'code' => '26521',
            'name' => 'Al-khalediah',
            'state_id'=> 4 ,
            'active' => 1
        ]);

        
    }
}
