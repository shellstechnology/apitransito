<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaracteristicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Caracteristicas::factory(1)->create([
            "descripcion_caracteristica" => "comestible",
        ]);
        \App\Models\Caracteristicas::factory(1)->create([
            "descripcion_caracteristica" => "electronicos",
        ]);
        \App\Models\Caracteristicas::factory(1)->create([
            "descripcion_caracteristica" => "inflamable",
        ]);
        \App\Models\Caracteristicas::factory(1)->create([
            "descripcion_caracteristica" => "explosivo",
        ]);
    }
}