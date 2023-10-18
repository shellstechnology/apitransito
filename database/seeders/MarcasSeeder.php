<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Marcas::factory(1)->create([
            "id"=>"42",
            "marca" => "marca update",
        ]);
        \App\Models\Marcas::factory(1)->create([
            "id"=>"47",
            "marca" => "marca listar",
        ]);
        \App\Models\Marcas::factory(1)->create([
            "id"=>"74",
            "marca" => "marca eliminar",
        ]);
    }
}