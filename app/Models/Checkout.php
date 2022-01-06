<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'buyer_name', 'email', 'phone', 'address', 'postal_code', 'total_price', 'payment', 'shipment', 'status'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

}
