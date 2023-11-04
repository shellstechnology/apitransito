<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Estados_CSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Estados_C::factory(1)->create([
            "id"=>"47",
            "descripcion_estado_c" => "estado c listar",
        ]);
        \App\Models\Estados_C::factory(1)->create([
            "id"=>"42",
            "descripcion_estado_c" => "estados c modificar",
        ]);
        \App\Models\Estados_C::factory(1)->create([
            "id"=>"74",
            "descripcion_estado_c" => "estados c eliminar",
        ]);
    }
}