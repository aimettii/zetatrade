<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    public $with = [
        'assortment',
        'booking_driver_language',
        'booking_type',
        'booking_status',
        'puesc_status',
        'epi_request',
        'epi_status',
        'token'
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
    protected $hidden = ['order_id'];

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        foreach ($this->with as $field)
        {
            $this->hidden[] = $field."_id";
        }
    }

    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

    public function assortment(){
        return $this->belongsTo('App\Models\Assortment');
    }

    public function booking_driver_language(){
        return $this->belongsTo('App\Models\Booking\BookingDriverLanguages');
    }

    public function booking_type(){
        return $this->belongsTo('App\Models\Booking\BookingTypes');
    }

    public function booking_status(){
        return $this->belongsTo('App\Models\Booking\BookingStatuses');
    }

    public function puesc_status(){
        return $this->belongsTo('App\Models\Booking\PuescStatuses');
    }

    public function token(){
        return $this->belongsTo('App\Models\Booking\BookingTokens');
    }

    public function epi_request(){
        return $this->belongsTo('App\Models\Epi\EpiRequests');
    }

    public function epi_status(){
        return $this->belongsTo('App\Models\Epi\EpiStatuses');
    }
}
