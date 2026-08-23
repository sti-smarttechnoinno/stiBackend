<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the admin user credentials.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sti-dz.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('password'),
            ]
        );
    }
}
