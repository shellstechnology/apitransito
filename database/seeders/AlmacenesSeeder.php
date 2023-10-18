<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Almacenes;
use App\Models\Lugares_Entrega;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AlmacenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Almacenes::factory(1)->create([
            "id" => "47",
            "id_lugar_entrega" => "3",
        ]);
        \App\Models\Almacenes::factory(1)->create([
            "id" => "74",
            "id_lugar_entrega" => "3",
        ]);
        \App\Models\Almacenes::factory(1)->create([
            "id" => "42",
            "id_lugar_entrega" => "3",
        ]);
    }
}