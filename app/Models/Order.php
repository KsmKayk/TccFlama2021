<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->hasOne(Status::class);
    }
    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
