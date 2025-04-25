<?php

// app/Models/Group.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    // Relationship with enrollments
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
