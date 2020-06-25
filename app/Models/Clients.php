<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
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
                  'ci'
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
     * @return App\Models\Sale
     */
    public function sale()
    {
        return $this->hasOne('App\Models\Sale','client_id','id');
    }

    public function full_name() {
        return $this->father_last_name
            . ' ' . $this->mother_last_name
            . ' ' . $this->second_name
            . ' ' .$this->name;
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */

}
