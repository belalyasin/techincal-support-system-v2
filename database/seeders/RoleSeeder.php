<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'super admin', 'guard_name' => 'user']);
        Role::create(['name' => 'admin', 'guard_name' => 'user']);
        Role::create(['name' => 'user', 'guard_name' => 'user']);

//        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'admin']);
//        Role::firstOrCreate(['name' => 'user', 'guard_name' => 'user']);
//        Role::firstOrCreate(['name' => 'super admin', 'guard_name' => 'admin']);
    }
}
