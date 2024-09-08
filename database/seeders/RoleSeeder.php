<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'Administrador',
                'created_at' => Carbon::parse('2024-08-16 01:12:08'),
                'updated_at' => Carbon::parse('2024-08-16 01:12:08'),
            ],
            [
                'id' => 2,
                'name' => 'Técnico de Mecanica',
                'created_at' => Carbon::parse('2024-08-16 01:12:34'),
                'updated_at' => Carbon::parse('2024-08-16 01:12:34'),
            ],
            [
                'id' => 3,
                'name' => 'Asesor',
                'created_at' => Carbon::parse('2024-08-16 01:12:42'),
                'updated_at' => Carbon::parse('2024-08-16 01:12:42'),
            ],
            [
                'id' => 4,
                'name' => 'Coordinador Seminuevos',
                'created_at' => Carbon::parse('2024-08-16 01:12:51'),
                'updated_at' => Carbon::parse('2024-08-16 01:12:51'),
            ],
            [
                'id' => 5,
                'name' => 'SuperAdmin',
                'created_at' => Carbon::parse('2024-08-16 01:12:51'),
                'updated_at' => Carbon::parse('2024-08-16 01:12:51'),
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
