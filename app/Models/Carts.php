<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $fillable = ['userId'];
    protected $primaryKey = 'CartId';

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'UserId', 'UserId');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItems::class, 'CartId', 'CartId');
    }
}

