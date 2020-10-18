<?php

namespace App\Models\Traits;

trait UserACLTrait
{
    public function permissions()
    {
        $tenant = $this->tenant;
        $plan = $tenant->plan;
        //$profiles = $plan->profiles;

        $permissions = [];
        foreach ($plan->profiles as $profile) {
            foreach($profile->permissions as $permission) {
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
