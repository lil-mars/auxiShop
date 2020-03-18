<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spare extends Model
{
    protected $fillable = [
        'code', 'category_id', 'car_line_id', 'brand_id',
        'description', 'nationality', 'measure', 'product_code',
        'original_code', 'quantity', 'price', 'price_m',
        'investment', 'image'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];


    //Providers
    public function providers() {
        return $this->belongsToMany(Provider::class, 'spare_provider', 'spare_id', 'provider_id');
    }
    public function spare_providers() {
        return $this->hasMany(SpareProvider::class, 'spare_id','id');
    }

    // Has many relations
    public function purchase_spares() {
        return $this->hasMany('App\Models\PurchaseSpare','purchase_id', 'id');
    }
    public function store_spares() {
        return $this->hasMany('App\Models\StoreSpare','spare_id', 'id');
    }
    public function sales_details() {
        return $this->hasMany(SaleDetail::class, 'spare_id', 'id');
    }



    // Belongs to relations
    public function brand() {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function car_line() {
        return $this->belongsTo('App\Models\CarLine', 'car_line_id');
    }
}
