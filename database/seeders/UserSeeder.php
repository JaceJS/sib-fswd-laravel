<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // memasukkan data user Admin
        $user = User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'phone' => $faker->phoneNumber,
        ]);

        // memasukkan data user Staff
        $user = User::create([
            'role_id' => 2,
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('123'),
            'phone' => $faker->phoneNumber,
        ]);

        // memasukkan 10 data user Customer
        for ($i=0; $i < 10; $i++) { 
            $user = User::create([
                'role_id' => 3,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('123'),
                'phone' => $faker->phoneNumber,
            ]);
        }        
    }
}
