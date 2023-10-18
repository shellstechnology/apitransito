<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class mail_usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Mail_usuarios::factory(1)->create([
            "id_usuarios"=>"10",
            "mail" => "torito@carrera",
        ]);
        \App\Models\Mail_usuarios::factory(1)->create([
            "id_usuarios"=>"20",
            "mail" => "chofer@mail",
        ]);
        \App\Models\Mail_usuarios::factory(1)->create([
            "id_usuarios"=>"47",
            "mail" => "listar@mail.com",
        ]);
        \App\Models\Mail_usuarios::factory(1)->create([
            "id_usuarios"=>"42",
            "mail" => "modificar@mail.com",
        ]);
        \App\Models\Mail_usuarios::factory(1)->create([
            "id_usuarios"=>"74",
            "mail" => "eliminar@mail.com",
        ]);
    }
}