<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankdetails extends Model
{
    use HasFactory;

    protected $table = 'bankdetails'; 

    protected $fillable = [
        'holder_id',
        'name',
        'role',
        'bank_name',
        'account_number',
        'account_holder_name',
        'ifsc_code',
        'branch_name',
    ];

    // Define the relationship with the Vendor model
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
