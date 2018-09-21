<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MapRole extends Model
{
    protected $table = 'named_role_user';


    public function uroles()
    {
        return $this->belongsToMany('App\RoleUser');
    }

}
