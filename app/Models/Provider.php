<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'id','company_name', 'father_last_name', 'mother_last_name', 'second_name',
        'name', 'occupation', 'address', 'phone', 'fax'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
    public function purchases() {
        return $this->hasMany('App\Models\Purchase', 'provider_id', 'id');
    }
}
