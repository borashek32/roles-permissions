<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'writer']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'asdf']);
        Role::create(['name' => 'zcxv']);
        Role::create(['name' => 'hfjd']);
        Role::create(['name' => 'opop']);
        Role::create(['name' => 'tgtg']);
        Role::create(['name' => 'jkjk']);
    }
}
