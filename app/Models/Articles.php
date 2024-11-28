<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = ['name','price','categoryId','menuId','imageUrl'];
    protected $primaryKey = 'ArticleId';

    public function category()
    {
        return $this->belongsTo(Categories::class, 'CategoryId', 'Id');
    }

    public function menu()
    {
        return $this->belongsTo(Menus::class, 'MenuId', 'Id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'ArticleId', 'ArticleId');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItems::class, 'ArticleId', 'ArticleId');
    }
}

