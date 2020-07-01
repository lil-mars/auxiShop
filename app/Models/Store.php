<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stores';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'name',
                  'address',
                  'phone',
                  'status'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the sale for this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sale()
    {
        return $this->hasOne('App\Models\Sale','store_id','id');
    }

    public function spares(){
        return $this->belongsToMany('App\Models\Spare', 'store_spare','store_id','spare_id');
    }
    /**
     * Get the storeSpare for this model.
     *
     * @return App\Models\StoreSpare
     */
    public function store_spares()
    {
        return $this->hasMany('App\Models\StoreSpare','store_id','id');
    }


}
