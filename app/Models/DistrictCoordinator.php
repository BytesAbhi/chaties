<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DistrictCoordinator extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'district';

    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'address',
        'district',
        'role',
        'vendor_id',
    ];

    protected static function booted()
    {
        static::creating(function ($coordinator) {
            $coordinator->password = bcrypt($coordinator->password);
        });
    }

    protected $hidden = ['password', 'remember_token'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
