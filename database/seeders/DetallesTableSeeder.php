<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('detalles')->insert([
            [
                'id' => 1,
                'nombre' => 'Frenos',
                'descripcion' => 'Frenos',
                'valor' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 2,
                'nombre' => 'Testigos',
                'descripcion' => 'Testigos',
                'valor' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 3,
                'nombre' => 'Estructura',
                'descripcion' => 'Estructura',
                'valor' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 4,
                'nombre' => 'Pintura',
                'descripcion' => 'Pintura',
                'valor' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 5,
                'nombre' => 'Neumáticos',
                'descripcion' => 'Neumáticos',
                'valor' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 6,
                'nombre' => 'Electrico',
                'descripcion' => 'Electrico',
                'valor' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 7,
                'nombre' => 'Interior',
                'descripcion' => 'Interior',
                'valor' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 8,
                'nombre' => 'Transmisión',
                'descripcion' => 'Transmisión',
                'valor' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'id' => 9,
                'nombre' => 'Embrague',
                'descripcion' => 'Embrague',
                'valor' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
