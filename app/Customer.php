<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    // use Notifiable;
    // use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // protected $dates = [
        // 'deleted_at'
    // ];

    /**
     * rules validasi untuk data customers.
     *
     * @var array
     */
    public static $rules = [
        'name'    => 'required',
        'phone'   => 'required',
        'address' => 'required',
    ];

    /**
     * setup variable mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'neighborhood',
        'activation',
        'code',
        'comments',
        'phone',
        'address',
        'email' ,
        'password'
    ];

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(
                function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%'.$keyword.'%');
                }
            );
        }

        return $query;
    }
}
