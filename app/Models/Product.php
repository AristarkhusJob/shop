<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;  
    
    protected $fillable = [
        'name', 'description', 'price', 'stock', 'image', 'tempImage'
    ];

    public function Cart(){
        return $this->hasMany(Cart::class);
    }

}
