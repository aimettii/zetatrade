<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Group extends Model
{

    /**
     * The groups that belong to the user.
     */
    public function privileges()
    {
        return $this->belongsToMany('App\Privilege');
    }
}
