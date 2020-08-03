<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sales';

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
                  'client_id',
                  'store_id',
                  'user_id',
                  'total_price',
                  'total_amount'
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
     * Get the Client for this model.
     *
     * @return App\Models\Client
     */
    public function Client()
    {
        return $this->belongsTo('App\Models\Client','client_id','id');
    }

    /**
     * Get the Store for this model.
     *
     * @return App\Models\Store
     */
    public function Store()
    {
        return $this->belongsTo('App\Models\Store','store_id','id');
    }

    /**
     * Get the User for this model.
     *
     * @return App\User
     */
    public function User()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    /**
     * Get the bill for this model.
     *
     * @return App\Models\Bill
     */
    public function bill()
    {
        return $this->hasOne('App\Models\Bill','sale_id','id');
    }

    /**
     * Get the saleDetail for this model.
     *
     * @return App\Models\SaleDetail
     */
    public function saleDetail()
    {
        return $this->hasMany('App\Models\SaleDetail','sale_id','id');
    }


    public function get_total_discount(){
        $discount = $this->saleDetail->sum('discount');
        return $discount;
    }
    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */


    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function get_creation(){
        $now = Carbon::now();
        $diff = $this->created_at->diffForHumans($now);
        return $diff;
    }
    public function get_last_update(){
        $now = Carbon::now();
        $diff = $this->updated_at->diffForHumans($now);
        return $diff;
    }

}
