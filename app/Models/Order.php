<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'status_id',
        'paypal_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function OrderStatus()
    {
        return $this->belongsTo(Order_status::class, 'status_id', 'id');
    }
}
