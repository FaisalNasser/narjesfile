<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Casts\AsArrayObject;




class ContactMessage extends Model
{
     use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];


    protected $table = 'contact_message';
    /**
     * rules validasi untuk data products.
     *
     * @var array
     */
 

    /**
     * setup variable mass assignment.
     *
     * @var array
     */
   

    // protected $casts = [
    //     'titles' => AsArrayObject::class,
    //     'prices' => AsArrayObject::class,
    // ];
    


    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(
                function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('barcode', 'LIKE', '%'.$keyword.'%');
                }
            );
        }

        return $query;
    }


    public function getCodesAttribute($value)
    {
        if(!$value) {
            return ;
        }

        return json_decode($value);
    }
}
