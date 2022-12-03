<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $adminrole = Role::create(['name' => 'superadmin']);
        $admin = Role::create(['name' => 'admin']);
        $employee = Role::create(['name' => 'employee']);
        $doctor = Role::create(['name' => 'doctor']);
        $doctor = Role::create(['name' => 'user']);


        $permissions = Permission::pluck('id','id')->all();
        $adminrole->syncPermissions($permissions);
    }
}