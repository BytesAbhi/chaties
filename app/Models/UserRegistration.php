<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // extends Auth so users can login
use Illuminate\Notifications\Notifiable;

class UserRegistration extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'location',
        'certificate_option',
        'certificate_price',
        'payment_status',
        'payment_date',
        'delivery_address',
        'delivery_status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'payment_date' => 'datetime',
    ];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
