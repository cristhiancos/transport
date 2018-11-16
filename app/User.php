<?php

namespace transportes;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='users';

    protected $primarykey='id';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'oficina',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
