<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lotes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Lotes::factory(1)->create([
            "id" => "1",
            "volumen_l" => "10",
            "peso_kg" => "10",
        ]);
        \App\Models\Lotes::factory(1)->create([
            "id" => "2",
            "volumen_l" => "20",
            "peso_kg" => "20",
        ]);
        \App\Models\Lotes::factory(1)->create([
            "id" => "47",
            "volumen_l" => "47",
            "peso_kg" => "47",
        ]);
        \App\Models\Lotes::factory(1)->create([
            "id" => "42",
            "volumen_l" => "42",
            "peso_kg" => "42",
        ]);
        \App\Models\Lotes::factory(1)->create([
            "id" => "74",
            "volumen_l" => "74",
            "peso_kg" => "74",
        ]);
        \App\Models\Lotes::factory(1)->create([
            "id" => "20",
            "volumen_l" => "20",
            "peso_kg" => "20",
        ]);
        \App\Models\Lotes::factory(1)->create([
            "id" => "100",
            "volumen_l" => "10",
            "peso_kg" => "10",
        ]);
    }
}