<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public $with = [
        'tractor',
        'trailer',
        'counterpartie',
        'border',
        'phones',
        'files',
        'sales',
        'created_by_user',
        'complied_by_user'
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

    public function created_by_user(){
        return $this->belongsTo('App\User');
    }

    public function complied_by_user(){
        return $this->belongsTo('App\User');
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

    /**
     * Файлы, относящиеся к заказу
     */
    public function files(){
        return $this->belongsToMany('App\Models\File', 'order_file');
    }
}
