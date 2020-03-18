<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'id', 'sale_id' ,'total_price', 'total_amount', 'client_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
    public function store() {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function client() {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }


    public function bill() {
        return $this->hasOne(Bill::class, 'sale_id', 'id');
    }
    public function sales_details(){
        return $this->hasMany(SaleDetail::class, 'sale_id', 'id');
    }
}
