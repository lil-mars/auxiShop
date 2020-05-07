<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'purchases';

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
                  'provider_id',
                  'contact',
                  'total_price'
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
     * Get the Provider for this model.
     *
     * @return App\Models\Provider
     */
    public function Provider()
    {
        return $this->belongsTo('App\Models\Provider','provider_id','id');
    }

    /**
     * Get the purchaseSpare for this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchase_spare()
    {
        return $this->hasMany('App\Models\PurchaseSpare','purchase_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    }

}
