<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        \App\Models\Moneda::factory(1)->create([
            "moneda" => "pesos uruguayos",
        ]);
        \App\Models\Moneda::factory(1)->create([
            "moneda" => "dolares",
        ]);
        \App\Models\Moneda::factory(1)->create([
            "moneda" => "reales",
        ]);
    }
  
}