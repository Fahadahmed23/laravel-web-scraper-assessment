<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     * php artisan db:seed --class=RolePermissionSeeder
     */
    public function run()
    {
        // Create permissions
        Permission::create(['name' => 'create-worldwide']);
        Permission::create(['name' => 'edit-worldwide']);
        Permission::create(['name' => 'view-worldwide']);
        Permission::create(['name' => 'delete-worldwide']);

        Permission::create(['name' => 'create-countries']);
        Permission::create(['name' => 'edit-countries']);
        Permission::create(['name' => 'view-countries']);
        Permission::create(['name' => 'delete-countries']);

        Permission::create(['name' => 'create-cities']);
        Permission::create(['name' => 'edit-cities']);
        Permission::create(['name' => 'view-cities']);
        Permission::create(['name' => 'delete-cities']);

        Permission::create(['name' => 'create-languages']);
        Permission::create(['name' => 'edit-languages']);
        Permission::create(['name' => 'view-languages']);
        Permission::create(['name' => 'delete-languages']);

        Permission::create(['name' => 'view-templates-updater']);

        Permission::create(['name' => 'create-page-content-requests']);
        Permission::create(['name' => 'edit-page-content-requests']);
        Permission::create(['name' => 'view-page-content-requests']);
        Permission::create(['name' => 'delete-page-content-requests']);

        Permission::create(['name' => 'create-page-contents']);
        Permission::create(['name' => 'edit-page-contents']);
        Permission::create(['name' => 'view-page-contents']);
        Permission::create(['name' => 'delete-page-contents']);


        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'view-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'create-permissions']);
        Permission::create(['name' => 'edit-permissions']);
        Permission::create(['name' => 'view-permissions']);
        Permission::create(['name' => 'delete-permissions']);


        Permission::create(['name' => 'create-roles']);
        Permission::create(['name' => 'edit-roles']);
        Permission::create(['name' => 'view-roles']);
        Permission::create(['name' => 'delete-roles']);



        // Create roles
        $editorRole = Role::create(['name' => 'Editor']);
        $adminRole = Role::create(['name' => 'Admin']);

         // Get existing roles from the database
         //$editorRole = Role::where('name', 'Editor')->first();
         //$adminRole = Role::where('name', 'Admin')->first();

        // Assign permissions to the 'Editor' role
        $editorRole->syncPermissions([
            'create-worldwide', 'edit-worldwide', 'view-worldwide',
            'view-countries',
            'create-cities', 'edit-cities', 'view-cities',
            'view-languages',
            'view-page-content-requests',
            'create-page-contents', 'edit-page-contents', 'view-page-contents',
        ]);

        // Get all permissions and assign them to the 'Admin' role
        $permissions = Permission::all();
        $adminRole->syncPermissions($permissions);
    }
}

