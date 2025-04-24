<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockCoordinator extends Model
{

    use HasFactory;

    // Table name (optional, Laravel automatically uses plural of the model name)
    protected $table = 'block_coordinators';
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'address',
        'district',
        'vendor_id',
    ];

    // If you want to hash the password when setting it
    protected static function booted()
    {
        static::creating(function ($coordinator) {
            $coordinator->password = bcrypt($coordinator->password);
        });
    }

    protected $hidden = ['password', 'remember_token'];
    
    // Relationship to the Vendor model
    public function vendor()
    {
        return $this->belongsTo(Vendor::class); // Each coordinator belongs to one vendor
    }
}
