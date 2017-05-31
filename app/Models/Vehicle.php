<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];



    public function type()
    {
        return $this->belongsTo('App\Models\Vehicle\VehicleTypes', 'vehicle_type_id');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Vehicle\VehicleBrands', 'vehicle_brand_id');
    }
}
