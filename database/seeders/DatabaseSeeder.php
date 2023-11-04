<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MonedaSeeder::class);
        $this->call(ProductoSeeder::class); 
        $this->call(CaracteristicasSeeder::class);
        $this->call(Estados_PSeeder::class);
        $this->call(Lugares_EntregaSeeder::class);
        $this->call(PaquetesSeeder::class);
        $this->call(LotesSeeder::class);
        $this->call(AlmacenesSeeder::class);
        $this->call(Paquete_Contiene_LoteSeeder::class);
        $this->call(MarcasSeeder::class);
        $this->call(ModelosSeeder::class);
        $this->call(Estados_CSeeder::class);
        $this->call(CamionesSeeder::class);
        $this->call(Camion_Lleva_LoteSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(telefonos_usuariosSeeder::class);
        $this->call(mail_UsuariosSeeder::class);
        $this->call(ChoferesSeeder::class);
        $this->call(chofer_conduce_camionSeeder::class);
    }
}
