<?php

namespace App\Models\Traits;

use App\Models\Tenant;

trait UserACLTrait
{
    /**
     * Retorna a permissão dos dois níveis de usuários "permissionsPlan() e permissionsRole()"
     */
    public function permissions()
    {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        $permissions = [];
        foreach ($permissionsRole as $permission) {
            if (in_array($permission, $permissionsPlan)) {
                array_push($permissions, $permission);
            }
        }

        return $permissions;
    }

    /**
     * Get Profiles (Retorna as permissões do Plano)
     */
    public function permissionsPlan(): array
    {
        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;

        $permissions = [];
        foreach ($plan->profiles as $profile) {
            foreach($profile->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    /**
     * Get Roles (Retorna as permissões dos Cargos)
     */
    public function permissionsRole() : array
    {
        $roles = $this->roles()->with('permissions')->get();

        $permissions = [];
        foreach ($roles as $role) {
            foreach($role->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }

    /**
     * Verifica se tem a permição "hasPermission()"
     */
    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

    /**
     * Verifica se é SuperAdmin
     */
    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }
    /**
     * Verifica se é SuperAdmin
     */
    public function isTenant(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }
}
