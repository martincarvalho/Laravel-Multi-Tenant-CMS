<?php

namespace App;

use OwenIt\Auditing\Auditable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Auditable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];


    /**
     * User role types
     *
     * @var array
     */
    public static $roles = [
        'admin' => 'Admin',
        'editor' => 'Editor'
    ];

    /**
     * Returns the user roles availables
     *
     * @return array
     */
    public static function getRoles()
    {
        return self::$roles;
    }

    public function isAdmin()
    {
        if($this->role == 'admin'){
            return true;
        }
        return false;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sites()
    {
        return $this->belongsToMany('App\Site');
    }
}
