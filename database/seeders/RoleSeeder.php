<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo(['users-manager', 'create-project', 'create-user', 'view-category', 'create-category', 'update-category', 'delete-category', 'order-pending', 'order-packing', 'order-shipping', 'order-completed', 'order-refund', 'order-decline']);

        $role = Role::create(['name' => 'content-creator']);
        $role->givePermissionTo('create-project');
    }
}
