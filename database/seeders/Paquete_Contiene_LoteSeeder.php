<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Almacenes;
use App\Models\Lotes;
use App\Models\Paquetes;
use App\Models\Paquete_Contiene_Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Paquete_Contiene_LoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\paquete_contiene_lote::factory(1)->create([
            "id_paquete" => "10",
            "id_lote" => "20",
            "id_almacen" => "47",
        ]);
        \App\Models\paquete_contiene_lote::factory(1)->create([
            "id_paquete" => "47",
            "id_lote" => "47",
            "id_almacen" => "47",
        ]);
        \App\Models\paquete_contiene_lote::factory(1)->create([
            "id_paquete" => "42",
            "id_lote" => "42",
            "id_almacen" => "47",
        ]);
        \App\Models\paquete_contiene_lote::factory(1)->create([
            "id_paquete" => "74",
            "id_lote" => "74",
            "id_almacen" => "74",
        ]);
        \App\Models\paquete_contiene_lote::factory(1)->create([
            "id_paquete" => "100",
            "id_lote" => "100",
            "id_almacen" => "47",
        ]);
        \App\Models\paquete_contiene_lote::factory(1)->create([
            "id_paquete" => "101",
            "id_lote" => "100",
            "id_almacen" => "47",
        ]);
        \App\Models\paquete_contiene_lote::factory(1)->create([
            "id_paquete" => "102",
            "id_lote" => "100",
            "id_almacen" => "47",
        ]);
        \App\Models\paquete_contiene_lote::factory(1)->create([
            "id_paquete" => "103",
            "id_lote" => "100",
            "id_almacen" => "47",
        ]);

    }
}