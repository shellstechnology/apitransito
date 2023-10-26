<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Modelos::factory(1)->create([
            "id"=>"42",
            "modelo" => "modelo modificar",
            "id_marca" => "42",
        ]);
        \App\Models\Modelos::factory(1)->create([
            "id"=>"47",
            "modelo" => "modelo listar",
            "id_marca" => "47",
        ]);
        \App\Models\Modelos::factory(1)->create([
            "id"=>"74",
            "modelo" => "modelo eliminar",
            "id_marca" => "74",
        ]);
    }
}