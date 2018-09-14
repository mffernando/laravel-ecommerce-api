<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Product extends Model
{

    protected $fillable = [
      'name', 'detail', 'stock', 'price', 'discount', 'user_id'
    ];

    public function reviews()
    {
      return $this->hasMany(Review::class);
    }
}
