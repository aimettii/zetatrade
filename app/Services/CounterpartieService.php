<?php

namespace App\Services;

use App\Models\Counterpartie;

class CounterpartieService extends Kernel
{

    public function firstOrCreate(){

        $data = $this->request->counterpartie;

        if(isset($data['id'])){
            return Counterpartie::find($data['id']);
        }

        return Counterpartie::firstOrCreate($data);
    }
}