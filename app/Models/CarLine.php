<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarLine extends Model
{
    public $timestamps = false;

    protected $table = 'car_lines';
    protected $fillable = [
        'name'
    ];
    public function clients() {
        return $this->hasMany('App\Models\Client', 'car_line_id', 'id');
    }
}
