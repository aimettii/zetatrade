<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assortment extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function group(){
        return $this->belongsTo('App\Models\Assortment\AssortmentGroups');
    }

}
