<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kosmanage.id'],
            [
                'name' => 'Administrator Kos',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'operator@kosmanage.id'],
            [
                'name' => 'Operator Kos',
                'password' => Hash::make('password123'),
                'role' => 'operator',
            ]
        );

        $this->call(PenghuniKostSeeder::class);
    }
}
