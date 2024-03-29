<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Traits\defaultUser;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId', 
        'name', 
        'email', 
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'userId' => 'string'
    ];
}
