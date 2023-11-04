<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class chofer_conduce_camionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\chofer_conduce_camion::factory(1)->create([
            "id_chofer"=>"10",
            "matricula_camion"=>"a20a",
        ]);
        \App\Models\chofer_conduce_camion::factory(1)->create([
            "id_chofer"=>"47",
            "matricula_camion"=>"a47a",
        ]);
        \App\Models\chofer_conduce_camion::factory(1)->create([
            "id_chofer"=>"42",
            "matricula_camion"=>"a42a",
        ]);
        \App\Models\chofer_conduce_camion::factory(1)->create([
            "id_chofer"=>"74",
            "matricula_camion"=>"a74a",
        ]);
    }
}