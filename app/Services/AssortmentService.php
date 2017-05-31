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
                    'language_driver_id' => 'required|integer|exists:countries,id',
                    'quantity_cargo' => 'required|boolean',
                    'booking_type_id' => 'required|integer|exists:booking_types,id',
                    'booking_on' => 'required|date',
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