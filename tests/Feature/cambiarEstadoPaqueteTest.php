<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estados_p;
use App\Models\Paquetes;
use Illuminate\Support\Facades\Validator;

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
    $response = $this->followingRedirects()->post('/api/paquete',
    [
        "id" => "42",
    ]);
    $response->assertStatus(200);
    $response->assertJsonFragment([
        "message" => "Paquete modificado con exito"
    ]);
}

public function test_MarcarComoEntregadoUnPaqueteQueNoExiste(){
$response = $this->followingRedirects()->post('/api/paquete',
    [
        "id" => "99999999999",
    ]);

$response->assertJsonFragment(
    [
        "message" => "No hay ningún paquete con esta id"
    ]);

}

}
