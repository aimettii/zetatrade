<?php

namespace App\Services;

use App\Models\Assortment;
use Illuminate\Support\Facades\Validator;

class AssortmentService extends Kernel
{
    public function validate($sales){
        $epi = false;
        $booking = false;

        foreach ($sales as $a){
            $group = Assortment::find($a['assortment_id'])->toArray()['group_id'];

            if(!$epi && $group == 1){
                $epi = true;
                $v = Validator::make($a, [
                    'quantity_codes' => 'required|integer',
                ]);
            }elseif(!$booking && $group == 2){
                $booking = true;
                $v = Validator::make($a, [
                    'booking_driver_language_id' => 'required|integer|exists:booking_driver_languages,id',
                    'quantity_cargo' => 'required|boolean',
                    'booking_type_id' => 'required|integer|exists:booking_types,id',
                    'reservation_time' => 'required|date',
                ]);
            }else{
                return false;
            }

            if ($v->fails()) {
                return false;
            }
        }

        return true;
    }
}