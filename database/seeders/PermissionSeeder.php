<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /**
         * Quyền User
         *
         */
        Permission::create(['name' => 'users-manager']);
        Permission::create(['name' => 'create-project']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);

        /**
         * Quyền Danh mục sản phẩm
         *
         */
        Permission::create(['name' => 'view-category']);
        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'update-category']);
        Permission::create(['name' => 'delete-category']);


        /**
         * Quyền cho Đơn hàng
         *
         */
        Permission::create(['name' => 'order-pending']);
        Permission::create(['name' => 'order-packing']);
        Permission::create(['name' => 'order-shipping']);
        Permission::create(['name' => 'order-completed']);
        Permission::create(['name' => 'order-refund']);
        Permission::create(['name' => 'order-decline']);
    }
}
