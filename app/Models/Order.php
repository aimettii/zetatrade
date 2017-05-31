<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function tractor(){
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function trailer(){
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function counterpartie(){
        return $this->belongsTo('App\Models\Counterpartie');
    }

    public function border(){
        return $this->belongsTo('App\Models\Border');
    }

    public function files(){
        return $this->belongsToMany('App\Models\File', 'order_file');
    }

    /**
     * Продажи, которые есть в заказе
     *
     * @return mixed
     */
    public function sales(){
        return $this->hasMany('App\Models\Sale');
    }

    /**
     * Телефоны, относящиеся к заказу
     */
    public function phones()
    {
        return $this->belongsToMany('App\Models\Phone', 'order_phone');
    }
}
