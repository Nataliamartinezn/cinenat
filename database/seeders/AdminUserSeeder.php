<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $password = config('cinenat.admin_password');

        if (empty($password)) {
            throw new \RuntimeException(
                __('messages.admin_password_not_configured')
            );
        }

        User::updateOrCreate(
            ['email' => 'admin@cinenat.test'],
            [
                'name' => 'Natilla',
                'password' => Hash::make($password),
                'role' => 'admin',
            ]
        );
    }
}