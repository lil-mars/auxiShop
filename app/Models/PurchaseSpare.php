<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseSpare extends Model
{
    protected $table = 'purchase_spare';
    protected $fillable = [
        'purchase_id', 'spare_id', 'unit_price', 'price',
        'quantity'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function spare() {
        return $this->belongsTo('App\Models\Spare', 'spare_id');
    }
    public function purchase() {
        return $this->belongsTo('App\Models\Purchase', 'purchase_id');
    }
}
