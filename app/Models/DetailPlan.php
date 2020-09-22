<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    /**
     * deinir nome tabela
     */
    protected $table = 'details_plan';

    /**
     * Compos que poderão serem preenchidos
     */
    protected $fillable = ['name'];

    /**
     * Relacionamentos 1 Detail para muitos Plans
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
