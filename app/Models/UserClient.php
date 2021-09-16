<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClient extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'gender',
        'phone',
        'address_id',
        'user_id'
    ];

    public function userAddress()
    {
        return $this->hasOne(UserAddress::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
