<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat role Admin
        Role::create([
            'name' => 'Admin',
        ]);

        // membuat role Staff
        Role::create([
            'name' => 'Staff',
        ]);

        // membuat role Customer
        Role::create([
            'name' => 'Customer',
        ]);
    }
}
