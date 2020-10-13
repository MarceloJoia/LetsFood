<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{

    /**
     * Retorna o identificador do Tenant.
     * auth()->user() retorna um objeto de Usuario
     */
    public function getTenantIdentify(): int//Tipo de retorno é Inteiro
    {
        return auth()->user()->tenant_id;
    }


    /**
     * Essa logica devove o Tenant em sí.
     *
     * Retorna relacionameto do Usuário com o Tenant. Objeto
     */
    public function getTenant(): Tenant //isso defina que o retorno será um objeto do Model Tenant
    {
        return auth()->user()->tenant;
    }


    /**
     * Verifica se o usuário é SuperAdmin ou não
     *
     * Verifica se o email está em nossa Class config\tenant.php.
     * Se o email do usuario estiver nesse Array retorna "True"
     */
    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('tenant.admins'));
    }
}
