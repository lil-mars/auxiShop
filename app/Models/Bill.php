<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'id', 'rut', 'total_price',
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
    public function sale() {
        return $this->belongsTo(Sale::class, 'sale_id');
    }
}
