<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function saveDatas()
    {
        return $this->hasOne('App\SaveData');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function visual_novels()
    {
        return $this->hasMany('App\VisualNovel');
    }

    public function hasRole($roleNames)
    {
        $roles = explode("&", $roleNames);

        foreach ($roles as $roleName) {
            if ($this->role->name === $roleName) {
                return true;
            }
        }
        
        return false;
    }
}
