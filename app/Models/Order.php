<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use TenantTrait;

    protected $fillable = ['tenant_id','identify', 'client_id','table_id', 'total', 'status', 'comment'];


    public function tenant()
    {
        return $this->BelongsTo(Tenant::class);
    }

    public function client()
    {
        return $this->BelongsTo(Client::class);
    }

    public function table()
    {
        return $this->BelongsTo(Table::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function evaluation()
    {
        return $this->hasMany(Evaluation::class);
    }
}
