<?php

namespace Modules\Wallet\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Wallet\Entities\Wallet;
/**
 * Class WalletTableSeeder.
 */
class WalletSeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run(): void
    {
        Wallet::create([
            'user_id' => 3,
            'balance'=>1000
        ]);
    }
}
