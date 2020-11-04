<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreUpdateClient;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthClientController extends Controller
{
    public function auth(StoreUpdateClient $request)
    {
       /*  $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]); */

        $client = Client::where('email', $request->email)->first();

        if (!$client || !Hash::check($request->password, $client->password)) {
            return response()->json(['message' => 'Credenciais inválida!'], 404);
        }

        $token = $client->createToken($request->device_name)->plainTextToken;

        return response()->json(['token' => $token], 404);
    }

    /**
     * Recuperar o Usuário autenticado
     */
    public function me(Request $request)
    {
        $client = $request->user();//Aqui temos o usuário autenticado com o Token

        return new ClientResource($client);
    }

    /**
     * Logout no Usuário
     */
    public function logout(Request $request)
    {
        $client = $request->user();

        // Revoke all token client...
        $client->tokens()->delete();

        return response()->json([], 204);
    }

}
