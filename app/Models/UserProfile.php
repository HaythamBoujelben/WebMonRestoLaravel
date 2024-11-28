<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['firstName','lastName','email'];
    protected $primaryKey = 'UserId';

    public function orders()
    {
        return $this->hasMany(Orders::class, 'UserId', 'UserId');
    }

    public function cart()
    {
        return $this->hasOne(Carts::class, 'UserId', 'UserId');
    }
}

