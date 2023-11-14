<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estados_p;
use App\Models\Paquetes;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class cambiarEstadoPaqueteTest extends TestCase
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

public function test_MarcarComoEntregadoUnPaqueteQueExiste(){
    $user = User::factory()->create();
    $this->withoutMiddleware();
    $response = $this->followingRedirects()->actingAs($user)->post('/api/paquete',
    [
        "paquetes" => ["42"],
    ]);
    $response->assertStatus(200);
    $response->assertJsonFragment([
        "message" => "paquetes modificados"
    ]);
    $this->withMiddleware();
}


}
