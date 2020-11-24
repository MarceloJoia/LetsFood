<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Validation Auth.
     *
     * @return void
     */
    public function testValidationAuth()
    {
        $response = $this->postJson('/api/auth/token');

        //$response->dump();

        $response->assertStatus(422);
    }

    /**
     * Auth Client Fake
     *
     * @return void
     */
    public function testAuthClientFake()
    {
        $payload = [
            'email' => 'faker_email@jm.com.br',
            'password' => '87654321',
            'device_name' => Str::random(10)
        ];

        $response = $this->postJson('/api/auth/token', $payload);

        //$response->dump();

        $response->assertStatus(404)
                ->assertExactJson([
                    'message' => trans('messages.invalid_credentials')
                ]);
    }

    /**
     * Client Succeces
     *
     * @return void
     */
    public function testClientSuccess()
    {
        $client = factory(Client::class)->create();

        $payload = [
            'email' => $client->email,
            'password' => 'password',
            'device_name' => Str::random(10),
        ];

        $response = $this->postJson('/api/auth/token', $payload);

        $response->assertStatus(200)
                    ->assertJsonStructure(['token']);
    }

    /**
     * Error get me
     *
     * @return void
     */
    public function testErrorGetMe()
    {
        $response = $this->getJson('/api/auth/me');

        $response->assertStatus(401);
    }

    /**
     * Get me
     *
     * @return void
     */
    public function testGetMe()
    {
        $client = factory(Client::class)->create();//cria o cliente
        $token = $client->createToken(Str::random(10))->plainTextToken;//gera o token para o cliente

        $response = $this->getJson('/api/auth/me', [
            'Authorization' => "Bearer {$token}",
        ]);

        //$response->dump();

        $response->assertStatus(200)
                    ->assertExactJson([
                        'data' => [
                            'name' => $client->name,
                            'email' => $client->email,
                        ]
                    ]);
    }

    /**
     * Logout
     *
     * @return void
     */
    public function testLogout()
    {
        $client = factory(Client::class)->create();//cria o cliente
        $token = $client->createToken(Str::random(10))->plainTextToken;//gera o token para o cliente

        $response = $this->postJson('/api/auth/logout', [], [
            'Authorization' => "Bearer {$token}",
        ]);

        $response->assertStatus(204);// 204 NO CONTENT
    }
}
