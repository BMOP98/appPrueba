<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DetallesTableSeeder::class,
            EstadoVehiculoSeeder::class,
            RoleSeeder::class,
        ]);
        \App\Models\User::create([
            'nombre' => 'superadmin',
            'email' => 'jeffes_04@live.com',
            'password' => bcrypt('password'),
            'rol_id' => 5
        ]);

    

    }
}
