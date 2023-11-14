<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Camion_Lleva_Lote;
use App\Models\Estados_p;
use App\Models\Lugares_Entrega;
use App\Models\Paquete_Contiene_Lote;
use App\Models\Paquetes;
use App\Models\Chofer_Conduce_Camion;
use App\Models\User;

class TransitoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

/** @test soy un mensaje para que se ejecuten las actions */
    public function test_BuscarUnIdQueExiste(){
        $user = User::factory()->create();
        $this->withoutMiddleware();
        $response = $this->followingRedirects()->actingAs($user)->post('api/ruta',
        [
            "id_usuario"=>  "42",
        ]);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "Paquete" => "paquete a modificar"
        ]);
        $this->withMiddleware();
       }

}
