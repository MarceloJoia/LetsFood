<?php

namespace App\Services;

use App\Models\Plan;


class TenantService
{
    private $plan, $data = [];

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        // Cadastro do Tenant
        $tenant = $this->storeTenant();

        // Criar o usuário dentro do tenant
        $user = $this->storeUser($tenant);

        return $user;// precisa retornar para (RegisterController)
    }

    /**
     * Cadastro do Tenant
     */
    public function storeTenant()
    {
        $data = $this->data;

        return $this->plan->tenants()->create([
            'cnpj' => $data['cnpj'], //Vem do formulário.
            'name' => $data['empresa'], //Vem do formulário.
            'email' => $data['email'], //Vem do formulário.

            'subscription' => now(), // define a data de inscrição.
            'expires_at' => now()->addDay(7), // define a data de expiração da degustação.
        ]);
    }

    /**
     * Cadastro do User
     */
    public function storeUser($tenant)
    {
        $user = $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return $user;
    }
}
