<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $invoice_prefix = 'INV';

    public static $tax_percentage = 10;

    public static $rules = [

    ];

    /**
     * setup variable mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'cashier_id',
        'name',
        // 'email',
        'phone',
        'table_id',
        'address',
        'comment',
        'receive_type',
        'time',
        'preSale',
        'evaluate',
        'useraddress',
        'invoiceAddress',
        'evaluateResult',
        'addresssame',
        'type',
        'status',
		'amount',
        'discount',
        'vat',
        'total_given',
        'change',
        'payment_with',
        'delivery_cost',
        'comments',
        'show_order',
        'card_number',
        'total_card',
    ];

    protected $appends = [
        'invoice_no',
    ];

    public function items()
    {
        return $this->hasMany('App\SaleItem' , 'Sale_id');
    }

    public function cashier()
    {
        return $this->belongsTo('App\User', 'cashier_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public static function search($params = [])
    {
        return self::when(
            !empty($params), function ($query) use ($params) {
                switch ($params['date_range']) {
                case 'today':
                    $query->whereDay('created_at', '=', date('d'));
break;
                case 'current_week':
                     $query->where('created_at', '>=', date('Y-m-d h:i:s' , strtotime("-7 days")));
break;
                case 'current_month':
                    $query->whereMonth('created_at', '=', date('m'));
break;
                default:

break;
                }

                return $query;
            }
        )->select("*" , "sales.id as id")->leftJoin("sale_items as s" , "s.sale_id" , '=', "sales.id" )->orderBy('sales.created_at', 'DESC');
    }

    public static function createAll($input_form)
    {

        return DB::transaction(
            function () use ($input_form) {
                // create object item
                $items = collect($input_form['items'])->map(
                    function ($item) {
                        return new SaleItem($item);
                    }
                );

                if(!empty(Customer::where("phone",$input_form['phone'])->get())){
                    $customer_id = Customer::where("phone",$input_form['phone'])->pluck('id')->first();
                    $input_form["customer_id"] = $customer_id;
                    // dd($input_form);

                } else {
                    $input_form["customer_id"] = null;

                }
                 if(!empty($input_form['receive_type'])) {
                    if($input_form["receive_type"] == "inRestaurant"){
                        unset($input_form["address"]);
                    }
                     if($input_form["receive_type"] == "inHome"){
                        unset($input_form["time"]);
                    }
   
                 }
                $sales = self::create($input_form);
                $sales->items()->saveMany($items);

                return $sales;
        }
    );
}
public static function createItems($input_form){
    return DB::transaction(
        function () use ($input_form) {
            // create object item
            $items = collect($input_form['items'])->map(
                function ($item) {
                    return new SaleItem($item);
                }
            );

            if(!empty(Customer::where("phone",$input_form['phone'])->get())){
                $customer_id = Customer::where("phone",$input_form['phone'])->pluck('id')->first();
                $input_form["customer_id"] = $customer_id;
                // dd($input_form);

            } else {
                $input_form["customer_id"] = null;

            }
             
            $sales = self::find($input_form['id']);
            $sales->items()->saveMany($items);

            return $sales;
    }
);
}


    public function getInvoiceNoAttribute()
    {
        return $this->invoice_prefix.str_pad($this->attributes['id'], 6, 0, STR_PAD_LEFT);
    }

    public function getSubtotalAttribute()
    {
        $subtotal = $this->items->map(
            function ($item) {
                return $item->price * $item->quantity;
            }
        );

        return $subtotal->sum();
    }

    public function getTaxAttribute()
    {
        return $this->subtotal * ($this->tax_percentage / 100);
    }




}
