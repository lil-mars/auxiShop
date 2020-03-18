<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'id','company_name', 'last_name',
        'name', 'occupation', 'address', 'phone', 'fax'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
    public function purchases() {
        return $this->hasMany('App\Models\Purchase', 'provider_id', 'id');
    }
    public function spares() {
        return $this->belongsToMany(Spare::class, 'spare_provider', 'provider_id', 'spare_id');
    }
}
