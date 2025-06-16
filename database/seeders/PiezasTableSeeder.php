<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Pieza;
use App\Models\User;

class PiezasTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::pluck('id', 'email');

        Pieza::insert([
            [
                'nombre' => 'B01',
                'peso_teorico' => 4,
                'peso_real' => 4.5,
                'estado' => 'Fabricado',
                'bloque_id' => 2, // BALC - 2210
                'fecha_registro' => '2020-09-11',
                'user_id' => $users['gabriel@minucia.com'],
            ],
            [
                'nombre' => 'A02',
                'peso_teorico' => 20,
                'peso_real' => null,
                'estado' => 'Pendiente',
                'bloque_id' => 5, // BALC - 3310
                'fecha_registro' =>null,
                'user_id' => null,
            ],
            [
                'nombre' => 'H12',
                'peso_teorico' => 16,
                'peso_real' => 16.6,
                'estado' => 'Fabricado',
                'bloque_id' => 6, // OPV - 2210
                'fecha_registro' => '2020-09-11',
                'user_id' => $users['sergio@minucia.com'],
            ],
            [
                'nombre' => 'R23',
                'peso_teorico' => 8,
                'peso_real' => null,
                'estado' => 'Pendiente',
                'bloque_id' => 1, // BICM - 1110
                'fecha_registro' =>null,
                'user_id' => null,
            ],
            [
                'nombre' => 'J25',
                'peso_teorico' => 11,
                'peso_real' => null,
                'estado' => 'Pendiente',
                'bloque_id' => 1, // BICM - 1110
                'fecha_registro' =>null,
                'user_id' => null,
            ],
            [
                'nombre' => 'U23',
                'peso_teorico' => 5,
                'peso_real' => 4,
                'estado' => 'Fabricado',
                'bloque_id' => 1, // BICM - 1110
                'fecha_registro' => '2020-09-11',
                'user_id' => $users['sergio@minucia.com'],
            ],
            [
                'nombre' => 'E29',
                'peso_teorico' => 8,
                'peso_real' => 7.2,
                'estado' => 'Fabricado',
                'bloque_id' => 1, // BICM - 1110
                'fecha_registro' => '2020-09-11',
                'user_id' => $users['luis@minucia.com'],
            ],
        ]);
    }
}