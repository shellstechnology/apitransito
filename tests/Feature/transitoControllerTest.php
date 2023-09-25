<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class transitoControllerTest extends TestCase
{    public function test_agregarUnAlmacen()
    {
        $response = $this->post('/transito', [
            "id_usuario" => 1,
        ]);
        $response->assertStatus(200);
    }

   
    
}
