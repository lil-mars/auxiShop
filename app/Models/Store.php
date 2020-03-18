<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name', 'address', 'phone', 'status'
    ];
    protected $dates = [
        'created_at' , 'updated_at'
    ];

    public function sales() {
        return $this->hasMany(Sale::class, 'client_id', 'id');
    }
    public function store_spares() {
        return $this->hasMany(StoreSpare::class, 'store_id', 'id');
    }
    public function spares() {
        return $this->belongsToMany(Spare::class, 'store_spare', 'store_id', 'spare_id');
    }
}
