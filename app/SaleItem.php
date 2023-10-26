<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    /**
     * setup variable mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'price',
        'size',
        'quantity',
        'p_qty',
        'codes'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function getSubtotalAttribute()
    {
        return $this->attributes['price'] * $this->attributes['quantity'];
    }

    public function trackings()
    {
        return $this->morphOne('App\InventoryTracking', 'trackable');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function getTaxAttribute()
    {
        return $this->price * 100 /  ($this->product->tax_percentage + $this->price)  *  ($this->product->tax_percentage / 100); 
    }
}
