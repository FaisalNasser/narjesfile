<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Casts\AsArrayObject;




class Product extends Model
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



    /**
     * rules validasi untuk data products.
     *
     * @var array
     */
    public static $rules = [
        'name'  => 'required|unique:products',
    ];

    /**
     * setup variable mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'prices',
        'category_id',
        'description',
        'titles',
        'codes',
        'quantity',
        'enable' ,
        'tax_percentage',
        'hairType',
        'sort' ,
        'expirence_image',
        'related_products',
        'related_products_price',
        'sale_percentage_type'
    ];


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
