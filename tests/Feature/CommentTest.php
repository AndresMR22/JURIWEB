<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class CommentTest extends TestCase
{

    /**
     * Prueba creacion usuario
     */
    public function test_create_user()
    {
        $user = User::factory()->create();
        $this->assertModelExists($user);
    }
    /**
     * Prueba basica de HTTP GET
     */
    public function test_a_basic_request(): void
    {
        $response = $this->get('/');
 
        $response->assertStatus(200);
    }

    /**
     * Prueba configuracion de cabecera
     */
    public function test_interacting_with_headers(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/user', ['name' => 'Sally']);
 
        $response->assertStatus(201);
    }

    /**
     * Prueba de creacion de cookies
     */
    public function test_interacting_with_cookies(): void
    {
        $response = $this->withCookie('color', 'blue')->get('/');
 
        $response = $this->withCookies([
            'color' => 'blue',
            'name' => 'Taylor',
        ])->get('/');
    }

    public function test_basic_test(): void
    {
        $this->assertTrue(true);
    }
}
