<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
    public function clients() {
        return $this->hasMany('App\Models\Client', 'brand_id', 'id');
    }
}
