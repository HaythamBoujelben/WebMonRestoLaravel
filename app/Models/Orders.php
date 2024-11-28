<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['userId','orderDate','totalPrice'];
    protected $primaryKey = 'OrderId';

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class, 'UserId', 'UserId');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'OrderId', 'OrderId');
    }
}

