<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    protected $fillable = ['cartId', 'articleId', 'quantity', 'price'];
    protected $primaryKey = 'CartItemId';

    public function cart()
    {
        return $this->belongsTo(Carts::class, 'CartId', 'CartId');
    }

    public function article()
    {
        return $this->belongsTo(Articles::class, 'ArticleId', 'ArticleId');
    }
}

