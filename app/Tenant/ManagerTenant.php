<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
public function getTenantIdentify(): int//Tipo de retorno é Inteiro
{
    return auth()->user()->tenant_id;//Retorna o identificador do Tenant. "auth()->user() retorna um objeto de Usuario"
}


    /**
     * Essa logica devove o Tenant em sí.
     */
    public function getTenant(): Tenant //isso defina que o retorno será um objeto do Model Tenant
    {
        return auth()->user()->tenant;//Retorna relacionameto do Usuário com o Tenant. Objeto
    }


    /**
     * Verifica se o usuário é SuperAdmin ou não
     */
    public function isAdmin(): bool
    {
        // Verifica se o email está em nossa Class Tenant.
        //Se o email do usuario estiver nesse Array retorna "True"
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
