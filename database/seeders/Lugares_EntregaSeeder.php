<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lugares_Entrega;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Lugares_EntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\lugares_entrega::factory(1)->create([
            "longitud" => "99",
            "latitud" => "99",
            "direccion" => "La vieja china",
        ]);
        \App\Models\lugares_entrega::factory(1)->create([
            "longitud" => "120",
            "latitud" => "30",
            "direccion" => "mi casita",
        ]);
        \App\Models\lugares_entrega::factory(1)->create([
            "longitud" => "47",
            "latitud" => "47",
            "direccion" => "almacen 47 listar",
        ]);
        \App\Models\lugares_entrega::factory(1)->create([
            "longitud" => "42",
            "latitud" => "42",
            "direccion" => "almacen 42 modificar",
        ]);
        \App\Models\lugares_entrega::factory(1)->create([
            "longitud" => "74",
            "latitud" => "74",
            "direccion" => "almacen 74 eliminar",
        ]);
    }
}