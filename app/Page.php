<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'sort'
    ];
}