<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{


    /*
    *
    * Run the database seeds.
    * php artisan db:seed --class=PermissionSeeder
    */

    public function run()
    {
        $permissions = [
            'create users',
            'edit users',
            'update users',
            'view users',
            'delete users',
            'create worldwide',
            'edit worldwide',
            'update worldwide',
            'view worldwide',
            'delete worldwide',
            'create countries',
            'edit countries',
            'update countries',
            'view countries',
            'delete countries',
            'create cities',
            'edit cities',
            'update cities',
            'view cities',
            'delete cities',
            'create languages',
            'edit languages',
            'update languages',
            'view languages',
            'delete languages',
            'run templateupdater',
            'view page content requests',
            'create page contents',
            'edit page contents',
            'update page contents',
            'view page contents',
            'delete page contents',
        ];

        foreach ($permissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }
    }
}
