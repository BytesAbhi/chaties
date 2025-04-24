<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupRegistration extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'groupregistrations';

    protected $fillable = [
        'email',
        'mobile',
        'password',
        'delivery_address',
        'referral_link',
        'payment_status',
        'payment_date',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'payment_date' => 'datetime',
    ];

    /**
     * Relationship: One group registration has many participants.
     */
    public function participants()
    {
        return $this->hasMany(GroupParticipant::class, 'groupregistration_id');
    }
}
