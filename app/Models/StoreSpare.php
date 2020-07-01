<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreSpare extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'store_spare';

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
                  'quantity',
                  'spare_id',
                  'store_id',
                  'comment'
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
     * Get the Spare for this model.
     *
     * @return App\Models\Spare
     */
    public function spare()
    {
        return $this->belongsTo('App\Models\Spare','spare_id','id');
    }

    /**
     * Get the Store for this model.
     *
     * @return App\Models\Store
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store','store_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
//    public function getCreatedAtAttribute($value)
//    {
//        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
//    }
//
//    /**
//     * Get updated_at in array format
//     *
//     * @param  string  $value
//     * @return array
//     */
//    public function getUpdatedAtAttribute($value)
//    {
//        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
//    }

}
