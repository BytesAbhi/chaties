<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'groupregistration_id',
        'participant_name',
        'parent_name',
        'email',
        'mobile',
        'paid',
        'photo_painting_flag',
        'photo_holding_flag',
        'approval_status',
        'e_certificate_sent',
        'delivery_status',
    ];

    protected $casts = [
        'paid' => 'boolean',
        'e_certificate_sent' => 'boolean',
    ];

    /**
     * Relationship: Each participant belongs to one group registration.
     */
    public function group()
    {
        return $this->belongsTo(GroupRegistration::class, 'groupregistration_id');
    }
}
