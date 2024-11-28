<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasMany(Articles::class, 'MenuId', 'Id');
    }
}
