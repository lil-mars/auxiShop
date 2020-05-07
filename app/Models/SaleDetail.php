<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    public $timestamps = false;
    protected $table = 'sale_details';
    protected $fillable = [
        'id', 'sale_id', 'spare_id' ,'price', 'quantity', 'discount', 'real_price'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function sale() {
        return $this->belongsTo(Sale::class, 'sale_id');
    }
    public function spare() {
        return $this->belongsTo(Spare::class, 'spare_id');
    }
}
