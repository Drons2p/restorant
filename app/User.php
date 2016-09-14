<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Grups()
            {
            return $this->belongsToMany('App\Grup');
            }
    public function Req()
            {
            return $this->hasMany('App\Grup');
            }
            
    public function Orders()
          {
            return $this->morphToMany('App\Order', 'orderable');
          }
}
