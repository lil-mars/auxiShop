<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps= true;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'father_last_name',
        'mother_last_name',
        'second_name',
        'name',
        'occupation',
        'address',
        'phone',
        'fax',
        'nit',
        'ci',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */



    public function getUpdatedAt()
    {
        $now = Carbon::now();
        $diff = $this->updated_at->diffForHumans($now);
        return $diff;
    }


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    /**
     * Get the sale for this model.
     *
     * @return App\Models\Sale
     */
    public function countSales() {
        return $this->sales->count();
    }
    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'client_id', 'id');
    }

    public function get_full_name()
    {
        return $this->father_last_name
            . ' ' . $this->mother_last_name
            . ' ' . $this->second_name
            . ' ' . $this->name;
    }


    /**
     * Get created_at in array format
     *
     * @param string $value
     * @return array
     */

    /**
     * Get updated_at in array format
     *
     * @param string $value
     * @return array
     */
//    public function getUpdatedAtAttribute($value)
//    {
//        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
//    }

}
