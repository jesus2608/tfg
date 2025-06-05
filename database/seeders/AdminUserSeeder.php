<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Verifica si ya existe
        if (!User::where('email', 'admin@admin.com')->exists()) {
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@gmail.com',
                'password' => 'admin123', 
                'is_admin' => true,
            ]);
        }
    }
}
