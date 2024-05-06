<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleUser = Role::create(['name' => 'User']);


        Permission::create(['name'=>'category'])->syncRoles([$roleAdmin,$roleUser]);
        Permission::create(['name'=>'category.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'category.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'category.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name'=>'users'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'users.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'users.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'users.destroy'])->syncRoles([$roleAdmin]);

    }
}
