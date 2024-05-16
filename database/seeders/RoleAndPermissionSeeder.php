<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'create-staff']);
        Permission::create(['name' => 'edit-staff']);
        Permission::create(['name' => 'delete-staff']);
        Permission::create(['name' => 'delete-pizza']);

        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);

        $adminRole->givePermissionTo([
            'create-staff',
            'edit-staff',
            'delete-staff',
            'delete-pizza'
        ]);

        $staffRole->givePermissionTo([
            'delete-pizza',
        ]);
    }
}
