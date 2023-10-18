<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Moneda;
use App\Models\Producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
        
            \App\Models\Producto::factory(1)->create([
                "id" => "7",
                "nombre" => "tuercas",
                "precio" => "25",
                "stock" => "1",
                "id_moneda" => "1",
            ]);
            \App\Models\Producto::factory(1)->create([
                "id" => "47",
                "nombre" => "Proyecto2023",
                "precio" => "9999",
                "stock" => "1",
                "id_moneda" => "1",
            ]);
            \App\Models\Producto::factory(1)->create([
                "id" => "74",
                "nombre" => "proyecto 2",
                "precio" => "9999",
                "stock" => "1",
                "id_moneda" => "1",
            ]);
            \App\Models\Producto::factory(1)->create([
                "id" => "42",
                "nombre" => "proyecto hector",
                "precio" => "9999",
                "stock" => "1",
                "id_moneda" => "1",
            ]);
            \App\Models\Producto::factory(1)->create([
                "id" => "10",
                "nombre" => "quesos cremosos",
                "precio" => "60",
                "stock" => "100",
                "id_moneda" => "1",
            ]);
            \App\Models\Producto::factory(1)->create([
                "id" => "11",
                "nombre" => "pan artesanal",
                "precio" => "100",
                "stock" => "20",
                "id_moneda" => "1",
            ]);
            \App\Models\Producto::factory(1)->create([
                "id" => "12",
                "nombre" => "Jamon la constancia",
                "precio" => "700",
                "stock" => "5",
                "id_moneda" => "1",
            ]);
            \App\Models\Producto::factory(1)->create([
                "id" => "13",
                "nombre" => "tomate fresco",
                "precio" => "60",
                "stock" => "100",
                "id_moneda" => "1",
            ]);
        }
    }
}