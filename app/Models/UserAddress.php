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
        'state',
        'house_number'
    ];

    public function UserClient()
    {
        return $this->belongsTo(UserClient::class);
    }
}
