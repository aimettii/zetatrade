<?php

namespace App\Models\Assortment;

use Illuminate\Database\Eloquent\Model;

class AssortmentGroups extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function assortments(){
        return $this->hasMany('App\Models\Assortment', 'group_id');
    }
}
