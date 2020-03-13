<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'id','company_name', 'father_last_name', 'mother_last_name', 'second_name',
        'name', 'occupation', 'address', 'phone', 'fax'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function sales() {
        return $this->hasMany(Sale::class, 'client_id', 'id');
    }

}
