<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spare extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spares';

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
                  'code',
                  'category_id',
                  'car_line_id',
                  'brand_id',
                  'description',
                  'nationality',
                  'measure',
                  'product_code',
                  'original_code',
                  'quantity',
                  'price',
                  'price_m',
                  'investment',
                  'image'
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
     * Get the Category for this model.
     *
     * @return App\Models\Category
     */
    public function Category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function has_car_line($id) {

        return $this->car_lines->contains($id);
    }
    /**
     *
     * Get the CarLine for this model.
     *
     * @return App\Models\CarLine
     */
    public function car_lines()
    {
        return $this->belongsToMany('App\Models\CarLine','spare_car_line','spare_id', 'car_line_id');
    }

    /**
     * Get the Brand for this model.
     *
     * @return App\Models\Brand
     */
    public function Brand()
    {
        return $this->belongsTo('App\Models\Brand','brand_id','id');
    }

    /**
     * Get the purchaseSpare for this model.
     *
     * @return App\Models\PurchaseSpare
     */
    public function purchaseSpare()
    {
        return $this->hasOne('App\Models\PurchaseSpare','spare_id','id');
    }
    /**
     * Get the saleDetail for this model.
     *
     * @return App\Models\SaleDetail
     */
    public function saleDetail()
    {
        return $this->hasOne('App\Models\SaleDetail','spare_id','id');
    }

    /**
     * Get the spareProvider for this model.
     *
     * @return App\Models\SpareProvider
     */
    public function spareProvider()
    {
        return $this->hasOne('App\Models\SpareProvider','spare_id','id');
    }

    /**
     * Get the storeSpare for this model.
     *
     * @return App\Models\StoreSpare
     */
    public function storeSpare()
    {
        return $this->hasOne('App\Models\StoreSpare','spare_id','id');
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


}
