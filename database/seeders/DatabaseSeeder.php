<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'password' => Hash::make('123456'),
                'role' => 'Admin',
            ]
        );

        User::firstOrCreate(
            ['username' => 'operator'],
            [
                'password' => Hash::make('123456'),
                'role' => 'Operator',
            ]
        );
    }
}
