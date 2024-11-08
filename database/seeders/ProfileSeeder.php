<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

/**
 * Class ProfileTableSeeder.
 */
class ProfileSeeder extends Seeder
{

    /**
     * Run the database seed.
     */
    public function run(): void
    {

        Profile::create([
            'user_id' => 3,
            'bio'=>trans('modules/profiles/seeders.welcome into my profile'),
            'gender'=>'1',
            'birth_date'=>'1995-06-09',

        ]);
        Profile::create([
            'user_id' => 4,
            'bio'=>trans('modules/profiles/seeders.welcome into my profile'),
            'gender'=>'0',
            'birth_date'=>'1995-06-10'

        ]);
        Profile::create([
            'user_id' => 5,
            'bio'=>trans('modules/profiles/seeders.welcome into my profile'),
            'gender'=>'1',
            'birth_date'=>'1995-06-11'

        ]);
        Profile::create([
            'user_id' => 6,
            'bio'=>trans('modules/profiles/seeders.welcome into my profile'),
            'gender'=>'0',
            'birth_date'=>'1995-06-12'

        ]);
    }
}
