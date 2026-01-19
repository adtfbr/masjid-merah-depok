<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@masjid.com',
            'password' => Hash::make('admin123'),
            'is_active' => true,
        ]);

        $this->command->info('Default admin user created!');
        $this->command->info('Email: admin@masjid.com');
        $this->command->info('Password: admin123');
    }
}
