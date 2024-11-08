<?php

namespace Modules\Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Payment\Entities\Payment;

use Modules\Payment\Entities\PaymentMethod;
/**
 * Class PaymentMethodTableSeeder.
 */
class PaymentMethodSeeder extends Seeder
{

    /**
     * Run the database seed.
     */
    public function run(): void
    {
        PaymentMethod::create([
                "name"=> "Paypal",
                "slug"=> "Paypal",
                "description"=> "Paypal",
                "icon"=> "paypal",
                "active"=> 1,
                "options"=>[
                    "client_id"=> "",
                    "client_secret"=> "",
                ],
        ]);
        PaymentMethod::create([
            "name"=> "Tap",
            "slug"=> "tap",
            "description"=> "tap",
            "icon"=> "tap",
            "active"=> 1,
            "options"=>[
            ],
    ]);
       
    }
}
