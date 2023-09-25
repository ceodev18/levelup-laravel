<?php
// app/Models/Cart.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Cart extends Model
{
    protected $fillable = ['user_id', 'total_price'];

     // Define the relationship with User
     public function user()
     {
         return $this->belongsTo(User::class);
     }

    // Define the many-to-many relationship with Product
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity') // Include the quantity column in the pivot table
            ->withTimestamps();     // Include timestamps for the pivot table
    }
}
