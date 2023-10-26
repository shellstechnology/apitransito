<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CamionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        \App\Models\Camiones::factory(1)->create([
        "matricula"=>"a20a",
        "id_estado_c" => "47",
        "id_modelo_marca"=>"47",
        "volumen_max_l" => "80",
        "peso_max_kg" => "80",
    ]);
    \App\Models\Camiones::factory(1)->create([
        "matricula"=>"a47a",
        "id_estado_c" => "47",
        "id_modelo_marca"=>"47",
        "volumen_max_l" => "99",
        "peso_max_kg" => "99",
    ]);
    \App\Models\Camiones::factory(1)->create([
        "matricula"=>"a42a",
        "id_estado_c" => "42",
        "id_modelo_marca"=>"42",
        "volumen_max_l" => "99",
        "peso_max_kg" => "99",
    ]);
    \App\Models\Camiones::factory(1)->create([
        "matricula"=>"a74a",
        "id_estado_c" => "74",
        "id_modelo_marca"=>"74",
        "volumen_max_l" => "99",
        "peso_max_kg" => "99",
    ]);
    }
}