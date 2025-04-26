<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Participant extends Authenticatable
{
    use HasFactory;

    protected $table = 'participants';

    protected $fillable = [
        'email',
        'mobile',
        'password',
        'profile_picture',
        'participant_name',
        'parent_name',
        'name',
        'phone',
        'certificate_option',
        'delivery_address',
        'delivery_status',
        'photo_flag',
        'photo_with_flag',
        'face_verified',
        'face_status',
        'can_download_certificate',
        'google_id',
    ];

    protected $casts = [
        'face_verified' => 'boolean',
        'can_download_certificate' => 'boolean',
    ];
}