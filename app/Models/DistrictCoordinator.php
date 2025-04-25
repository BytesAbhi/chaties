<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictCoordinator extends Model
{
    use HasFactory;

    // Table name (optional, Laravel automatically uses plural of the model name)
    protected $table = 'district_coordinators';

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'address',
        'district',
        'vendor_id',
    ];

    protected $hidden = ['password', 'remember_token'];
    
    // Relationship to the Vendor model
    public function vendor()
    {
        return $this->belongsTo(Vendor::class); // Each coordinator belongs to one vendor
    }

    // Automatically hash password when setting
    protected static function booted()
    {
        static::creating(function ($coordinator) {
            $coordinator->password = bcrypt($coordinator->password);
        });
    }
}
