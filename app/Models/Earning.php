<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $fillable = ['block_coordinator_id', 'total_earnings'];

    // Relationship with block coordinator (User model)
    public function blockCoordinator()
    {
        return $this->belongsTo(User::class, 'block_coordinator_id');
    }
}