<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'contact', 'total_price', 'provider_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function provider() {
        return $this->belongsTo('App\Models\Provider', 'provider_id');
    }
    public function purchase_spares() {
        return $this->hasMany('App\Models\PurchaseSpare','purchase_id', 'id');
    }
}
