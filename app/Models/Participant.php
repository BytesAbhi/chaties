<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'userregistration_id',
        'profile_picture',
        'participant_name',
        'parent_name',
        'email',
        'mobile',
        'certificate_option',
        'delivery_address',
        'delivery_status',
        'photo_flag',
        'photo_with_flag',
        'face_verified',
        'face_status',
        'can_download_certificate',
    ];

    protected $casts = [
        'face_verified' => 'boolean',
        'can_download_certificate' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(UserRegistration::class, 'userregistration_id');
    }
}
