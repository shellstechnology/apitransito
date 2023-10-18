<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class telefonos_usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Telefonos_usuarios::factory(1)->create([
            "id_usuarios"=>"47",
            "telefono" => "tel list",
        ]);
        \App\Models\Telefonos_usuarios::factory(1)->create([
            "id_usuarios"=>"42",
            "telefono" => "tel mod",
        ]);
        \App\Models\Telefonos_usuarios::factory(1)->create([
            "id_usuarios"=>"74",
            "telefono" => "tel del",
        ]);
    }
}