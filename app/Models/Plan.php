<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name','url','price','description'];


    /**
     * Relacionamento de 1 Plan para muitos Details
     */
    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    /**
     * Get Profile | Relacionamento de muitos para muitos Plans X Profiles
     */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    /**
     * Get Tenants this plan
     */
    public function tenants()
    {
        return $this->hasMany(Tenant::class);// Um para muitos
    }

    /**
     * Method Search Plans
     */
    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate(1);
        return $results;
    }

    /**
     * Profiles not link with this Plan
     */
    public function profilesAvailable($filter = null)
    {
        $profiles = Profile::whereNotIn('profiles.id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->where(function($queryFilter) use ($filter){
            if ($filter) {
                $queryFilter->where('profiles.name', 'LIKE', "%{$filter}%");
            }
        })
        //->toSql();
        //dd($profiles);
        ->paginate();

        return $profiles;
    }
}
