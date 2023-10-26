<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   
    protected $fillable = [
        'name',
        'email',
        'message',
        'pathFile',
        'stars',
        'productId',
        'image'
    ];

}
