<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'zip_code',
        'street',
        'complement',
        'neighborhood',
        'city',
        'state'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}