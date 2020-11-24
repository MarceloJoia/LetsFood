<?php

namespace Tests\Feature\Api;

use App\Models\{
    Client,
    Order,
};
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EvaluationTest extends TestCase
{
    /**
     * Error Create New Evaluation Order.
     *
     * @return void
     */
    public function testErrorCreateNewEvaluationOrder()
    {
        $Order = 'faker_value';

        $response = $this->postJson("/api/auth/v1/orders/{$Order}/evaluations");

        $response->assertStatus(401);
    }

    /**
     * Create New Evaluation Order.
     *
     * @return void
     */
    public function testCreateNewEvaluationOrder()
    {
        $client = factory(Client::class)->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;//gera o token para o cliente

        $order = $client->orders()->save(factory(Order::class)->make());// Cria uma nova relacionada com esse cliente
        //$order = factory(Order::class, 3)->create(['client_id' => $client->id]); // Cria 3 Ordem

        $payload = [
            'stars' => 5,
            'comment' => Str::random(50),
        ];

        $headers = [
            'Authorization' => "Bearer {$token}",
        ];

        $response = $this->postJson("/api/auth/v1/orders/{$order->identify}/evaluations", $payload, $headers);

        $response->assertStatus(201);
    }
}
