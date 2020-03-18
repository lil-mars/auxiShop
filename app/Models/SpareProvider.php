<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SpareProvider extends Model
{
    protected $table = 'spare_provider';
    protected $fillable = [
      'provider_id', 'spare_id' , 'price'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];
    public function provider() {
        return $this->belongsTo(Provider::class, 'provider_id');
    }
    public function spare() {
        return $this->belongsTo(Spare::class, 'spare_id');
    }

}
