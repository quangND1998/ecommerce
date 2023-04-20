<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Order\Entities\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('payment_methods')->count() == 0) {
            PaymentMethod::create([
                'name' => 'Thanh toán khi giao hàng (COD)', 'priority' => '0', 'thumb' => 'payment/1681876973cod1.png', 'active' => '1', 'created_at' => '2023-04-19 03:19:23', 'updated_at' => '2023-04-19 07:49:27'
            ]);
        }
    }
}
