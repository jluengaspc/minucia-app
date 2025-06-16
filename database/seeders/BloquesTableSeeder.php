<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Bloque;
use App\Models\Proyecto;

class BloquesTableSeeder extends Seeder
{
    public function run()
    {
        Bloque::insert([
            ['nombre' => '1110', 'proyecto_codigo' => 'BICM'],
            ['nombre' => '2210', 'proyecto_codigo' => 'BALC'],
            ['nombre' => '3510', 'proyecto_codigo' => 'BICM'],
            ['nombre' => '3610', 'proyecto_codigo' => 'BICM'],
            ['nombre' => '3310', 'proyecto_codigo' => 'BALC'],
            ['nombre' => '2210', 'proyecto_codigo' => 'OPV'],
        ]);
    }
}