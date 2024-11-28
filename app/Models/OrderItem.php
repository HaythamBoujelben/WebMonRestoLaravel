<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['orderId', 'articleId', 'quantity', 'price'];
    protected $primaryKey = 'OrderItemId';

    public function order()
    {
        return $this->belongsTo(Orders::class, 'OrderId', 'OrderId');
    }

    public function article()
    {
        return $this->belongsTo(Articles::class, 'ArticleId', 'ArticleId');
    }
}

