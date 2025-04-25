<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlockCoordinator extends Authenticatable  
{
    use HasFactory, Notifiable;

    protected $table = 'block'; 

    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'address',
        'block',
        'role',
        'distt_coord',
    ];

    // Encrypt the password when creating a new record
    // protected static function booted()
    // {
    //     static::creating(function ($coordinator) {
    //         $coordinator->password = bcrypt($coordinator->password);
    //     });
    // }

    protected $hidden = ['password', 'remember_token'];


    // public function vendor()
    // {
    //     return $this->belongsTo(DistrictCoordinator::class); 
    // }
}
