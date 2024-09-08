<?php

namespace Database\Seeders;

use App\Models\EstadoVehiculo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            [
                'id' => 1,
                'estado' => 'Inicio',
                'created_at' => Carbon::parse('2024-08-06 03:13:02'),
                'updated_at' => Carbon::parse('2024-08-06 03:13:02'),
            ],
            [
                'id' => 2,
                'estado' => 'Revisión',
                'created_at' => Carbon::parse('2024-08-06 03:13:07'),
                'updated_at' => Carbon::parse('2024-08-06 03:13:07'),
            ],
            [
                'id' => 3,
                'estado' => 'Precios',
                'created_at' => Carbon::parse('2024-08-06 03:13:11'),
                'updated_at' => Carbon::parse('2024-08-06 03:13:11'),
            ],
            [
                'id' => 4,
                'estado' => 'Precios Actualizados',
                'created_at' => Carbon::parse('2024-08-06 03:13:15'),
                'updated_at' => Carbon::parse('2024-08-07 06:27:39'),
            ],
            [
                'id' => 5,
                'estado' => 'Avaluo',
                'created_at' => Carbon::parse('2024-08-07 06:08:39'),
                'updated_at' => Carbon::parse('2024-08-07 06:27:46'),
            ],
            [
                'id' => 6,
                'estado' => 'Revisión Oferta',
                'created_at' => Carbon::parse('2024-08-07 06:27:51'),
                'updated_at' => Carbon::parse('2024-08-14 03:40:52'),
            ],
            [
                'id' => 7,
                'estado' => 'Finalizado',
                'created_at' => Carbon::parse('2024-08-07 06:27:51'),
                'updated_at' => Carbon::parse('2024-08-14 03:40:52'),
            ],
        ];

        foreach ($estados as $estado) {
            EstadoVehiculo::create($estado);
        }
    }
}
