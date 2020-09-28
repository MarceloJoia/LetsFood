<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * get permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Get Plans | Relacionamento de Muitos para muitos Profile X Plan
     */
    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    /**
     * Permission not link with this profile
     */
    public function permissionsAvailable($filter = null)
    {
        $permissions = Permission::whereNotIn('permissions.id', function($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if ($filter) {
                $queryFilter->where('permissions.name', 'LIKE', "%{$filter}%");
            }
        })
        //->toSql();
        //dd($permissions);
        ->paginate();

        return $permissions;
    }
}
