<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assortment extends Model
{

    public $with = [
        'type',
        'group'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        foreach ($this->with as $field)
        {
            $this->hidden[] = $field."_id";
        }
    }

    public function group(){
        return $this->belongsTo('App\Models\Assortment\AssortmentGroups');
    }

    public function type(){
        return $this->belongsTo('App\Models\Assortment\AssortmentTypes');
    }

    public function sales(){
        return $this->hasMany('App\Models\Sale');
    }
}
