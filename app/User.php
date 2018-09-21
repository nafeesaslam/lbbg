<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'about', 'confirmation_token', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Custome scope for Active Users.
     *
     * @return string
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    /**
     * Get the blogs record associated with the user.
     */
    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }

    /**
     * Get the category record associated with the user.
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * The Roles that belong to the Users.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function nroles()
    {
        return $this->hasOne('App\MapRole');
    }

    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
         $vo =  $this->roles()->where('role', $role)->first();
         dd(json_encode($vo));
    }
    
    /**
    * Check one role
    * @param string $namedRole
    */
    public function hasNamedrole($namedRole)
    {
       if($id = $this->nroles()->first())
       {
           //dd(json_encode($id));
            $roleids = RoleUser::select('role_id')->where('named_role_id',$id->named_role_id)->first();
            $userid = MapRole::select('user_id')->where('named_role_id',$id->named_role_id)->first();
            //dd(json_encode($roleids));
            if(!empty($roleids))
            {
                 $ids = array();
                 // foreach($roleids as $key => $value)
                 // {
                    $ids[] = Role::select('id','role','description')->where('id', $roleids->role_id)->first();
                // }
                    $y = $ids;
                 $uuid = array(
                  
                    "user_id" =>$userid->user_id,"role_id" => $roleids->role_id
                   
                 );


                 $x = array();
                 $z=array_push($ids, $uuid['user_id']);
                 //$x = array_merge($y,$uuid);
                 //dd(json_encode(array_merge($y, $uuid)));
                 dd(json_encode($y));
              // dd(json_encode(array($ids,"pivot" => ["user_id" => $userid->user_id,"role_id" => $roleids->role_id])));
               //return $ids;
            }

            //return null !== Role::select('role')->where('id', $roleids->role_id)->get();
       }
    
    }

    
}
