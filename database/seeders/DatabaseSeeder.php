<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\LaratrustSeeder;
use Database\Seeders\Geocode\GeocodeDatabaseSeeder;
use Database\Seeders\BoardDatabaseSeeder;
use Database\Seeders\BannerDatabaseSeeder;
use Database\Seeders\ReviewDatabaseSeeder;
use Modules\Payment\Database\Seeders\PaymentDatabaseSeeder;
use Database\Seeders\ProfileDatabaseSeeder;

use Modules\Payment\Database\Seeders\PaymentMethodSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(PaymentMethodSeeder::class);
        $this->call(GeocodeDatabaseSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(BoardDatabaseSeeder::class);
        $this->call(BannerDatabaseSeeder::class);
        $this->call(ReviewDatabaseSeeder::class);
        $this->call(PaymentDatabaseSeeder::class);
        $this->call(ProfileDatabaseSeeder::class);
        $this->call(PostDatabaseSeeder::class);
        $this->call(CommentDatabaseSeeder::class);
        $this->call(HashtagDatabaseSeeder::class);
        $this->call(LikeDatabaseSeeder::class);
        $this->call(ReshareDatabaseSeeder::class);
    }
}

