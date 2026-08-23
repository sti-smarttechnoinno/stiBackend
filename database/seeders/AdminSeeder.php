<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed only the Super Admin user with strong security credentials.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sti-dz.com'],
            [
                'name' => 'Admin User',
                'username' => 'admin',
                'password' => Hash::make('Sti@2026#AdminSecured!987'),
                'role_id' => 'super_admin',
                'role_name' => 'Super Admin',
                'status' => 'Active',
            ]
        );
    }
}
