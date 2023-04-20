<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\ProductCategory\Entities\CategoryProduct;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CateogoryProductSeeder::class,
            AttributeSeeder::class,
            SettingSeeder::class,
            PaymentMethodSeeder::class
        ]);
    }
}
