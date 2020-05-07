<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    public function full_name() {
        return $this->last_name
            . ' ' .$this->name;
    }


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'providers';

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
                  'company_name',
                  'name',
                  'last_name',
                  'occupation',
                  'address',
                  'city',
                  'postal_code',
                  'country',
                  'phone',
                  'fax'
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
     * Get the purchase for this model.
     *
     * @return App\Models\Purchase
     */
    public function purchase()
    {
        return $this->hasOne('App\Models\Purchase','provider_id','id');
    }

    /**
     * Get the spareProvider for this model.
     *
     * @return App\Models\SpareProvider
     */
    public function spareProvider()
    {
        return $this->hasOne('App\Models\SpareProvider','provider_id','id');
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
