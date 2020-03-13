<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'id','total_price', 'total_amount', 'client_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function client() {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
}
