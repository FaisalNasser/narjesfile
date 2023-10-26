<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrinterUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'printer_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
