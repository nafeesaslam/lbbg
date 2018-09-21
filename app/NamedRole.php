<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamedRole extends Model
{
    protected $table='named_role';




    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

  
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('role', $role)->first();
    }

  

}
