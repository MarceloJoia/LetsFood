<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'cnpj', 'name', 'email', 'url', 'logo', 'active', 'subscription', 'expires_at', 'subscription_id', 'subscription_active', 'subscription_suspended',
    ];

    /**
     * Get all Users
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get Plan if Tenant
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class); //Retorna o plano que esse Tenant está cadastrado.
    }
}
