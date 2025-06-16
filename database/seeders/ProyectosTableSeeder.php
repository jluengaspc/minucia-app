<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class ProyectosTableSeeder extends Seeder
{
    public function run()
    {
        Proyecto::insert([
            ['codigo' => 'BICM', 'nombre' => 'Oceanográfico'],
            ['codigo' => 'BALC', 'nombre' => 'Buque DA'],
            ['codigo' => 'OPV',  'nombre' => 'Offshore'],
            ['codigo' => 'BRF',  'nombre' => 'Recfluival'],
        ]);
    }
}