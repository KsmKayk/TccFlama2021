<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image_url',
        'description',
    ];
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class, 'product_tags');
    }
}
