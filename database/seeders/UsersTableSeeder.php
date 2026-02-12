<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('pass'),
                'phone' => '0600112233',
                'address' => 'f dora',
                'role_id' => 1,
            ]
        );

        User::updateOrCreate(
            ['email' => 'client@client.com'],
            [
                'name' => 'client',
                'password' => Hash::make('pass'),
                'phone' => '0600112233',
                'address' => '7da admin',
                'role_id' => 3,
            ]
        );
    }
}
