<?php

namespace App\Http\Controllers;

use App\Privilege;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Вернуть отформатированные данные пользователя
     *
     * @return mixed
     */
    public function getUserData(){

        if(Auth::check()){
            $user = Auth::user()->with('groups.privileges')->first()->toArray();

            $collection = Privilege::all();

            $privileges = $collection->mapWithKeys(function ($item) {
                return [$item['action'] => false];
            })->toArray();


            foreach ($user['groups'] as &$v){
                $user['privileges'][] = $v['privileges'];
                $v = $v['name'];
            }

            foreach ($user['privileges'] as &$v){
                foreach ($v as $v1){
                    $privileges[$v1['action']] = true;
                }
            }

            $user['privileges'] = $privileges;
        }else{
            $user = false;
        }

        return ['user' => $user];
    }

}
