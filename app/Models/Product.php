<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id' ,'code' , 'description', 'brand' , 'category', 'country',
        'measure', 'productCode', 'price', 'investment', 'originalCode',
        'image', 'quantity'
    ];
}
