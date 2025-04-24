<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'vendor';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'state',
        'address'
    ];

    protected $hidden = ['password', 'remember_token'];
}
