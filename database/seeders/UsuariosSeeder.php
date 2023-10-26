<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Usuarios::factory(1)->create([
            "id" => "10",
            "nombre_de_usuario"=>"toreto",
            "contrasenia" => "ee",
        ]);
        \App\Models\Usuarios::factory(1)->create([
            "id" => "20",
            "nombre_de_usuario"=>"choferpreba",
            "contrasenia" => "dd",
        ]);
        \App\Models\Usuarios::factory(1)->create([
            "id" => "47",
            "nombre_de_usuario"=>"usuario a listar",
            "contrasenia" => "aaa",
        ]);
        \App\Models\Usuarios::factory(1)->create([
            "id" => "42",
            "nombre_de_usuario"=>"usuario a modificar",
            "contrasenia" => "bb",
        ]);
        \App\Models\Usuarios::factory(1)->create([
            "id" => "74",
            "nombre_de_usuario"=>"usuario a eliminar",
            "contrasenia" => "cc",
        ]);
    }
}