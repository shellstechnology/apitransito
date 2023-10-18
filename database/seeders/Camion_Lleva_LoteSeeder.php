<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class camion_lleva_loteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Camion_Lleva_Lote::factory(1)->create([
            "id_lote" => "47",
            "matricula"=>"a47a",
        ]);
        \App\Models\Camion_Lleva_Lote::factory(1)->create([
            "id_lote" => "42",
            "matricula"=>"a42a",
        ]);
        \App\Models\Camion_Lleva_Lote::factory(1)->create([
            "id_lote" => "74",
            "matricula"=>"a74a",
        ]);
        \App\Models\Camion_Lleva_Lote::factory(1)->create([
            "id_lote" => "100",
            "matricula"=>"a74a",
        ]);
    }
}