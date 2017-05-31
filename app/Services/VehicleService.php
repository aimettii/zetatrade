<?php

namespace App\Services;

use App\Models\Vehicle;

class VehicleService extends Kernel
{

    protected $isTractor = false;

    public function firstOrCreate(){

        $data = $this->isTractor ? $this->request->tractor : $this->request->trailer;

        $data['tractor'] = $this->isTractor;

        if(isset($data['id'])){
            return Vehicle::find($data['id']);
        }

        return Vehicle::firstOrCreate($data);
    }

    public function isTractor($bool){
        $this->isTractor = $bool;
        return $this;
    }



}