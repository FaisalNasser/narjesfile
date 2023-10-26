<?php

namespace App\Http\Controllers;

use App\Events\UpdateOrderStatusEvent;
use Illuminate\Http\Request;
use Auth;
use App\Sale;
use App\Product;
use App\Category;
use Session;
use Validator;
use DB;
use App\Http\Requests;
use App\Setting;
use PHPUnit\TextUI\XmlConfiguration\Logging\Logging;
use Twilio\Rest\Trusthub\V1\TrustProducts\TrustProductsEvaluationsList;

class OrderController extends Controller
{

    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Page Lisitng on admin.
     */
    public function index()
    {
        $languages = json_decode(setting_by_key("languages"), true);

        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $incomplete = Sale::whereIn("type", ["order", "pos"])
            ->where("status", 2)
            ->orderBy("id", "DESC")
            ->limit(
                10
            )->get();

        foreach ($incomplete as $order) {
            foreach ($order->items as $pro) {
                $pro->translation = DB::table("products_translation")->where("product_id", $pro->product_id)
                    ->where("lang", $lang)->first();
            }
        }
        $data['incomplete'] = $incomplete;

        $completed = Sale::whereIn("type", ["order", "pos"])
            ->where("status", 1)
            ->orderBy("id", "DESC")->limit(5)->get();
        foreach ($completed as $order) {
            foreach ($order->items as $pro) {
                $pro->translation = DB::table("products_translation")->where("product_id", $pro->product_id)
                    ->where("lang", $lang)->first();
            }
        }
        $data['completed'] = $completed;
        $canceled = Sale::whereIn("type", ["order", "pos"])
            ->where("status", 0)
            ->orderBy("id", "DESC")
            ->limit(10)
            ->get();
        foreach ($canceled as $order) {
            foreach ($order->items as $pro) {
                $pro->translation = DB::table("products_translation")->where("product_id", $pro->product_id)
                    ->where("lang", $lang)->first();
            }
        }
        $data['canceled'] = $canceled;
        $indelivery = Sale::whereIn("type", ["order", "pos"])
            ->where("status", 4)
            ->orderBy("id", "DESC")
            ->limit(10)
            ->get();
        foreach ($indelivery as $order) {
            foreach ($order->items as $pro) {
                $pro->translation = DB::table("products_translation")->where("product_id", $pro->product_id)
                    ->where("lang", $lang)->first();
            }
        }
        $data['indelivery'] = $indelivery;
        $inprogress = Sale::whereIn("type", ["order", "pos"])
            ->where("status", 3)
            ->orderBy("id", "DESC")
            ->limit(10)
            ->get();
        foreach ($inprogress as $order) {
            foreach ($order->items as $pro) {
                $pro->translation = DB::table("products_translation")->where("product_id", $pro->product_id)
                    ->where("lang", $lang)->first();
            }
        }
        $data['inprogress'] = $inprogress;
        $data['title'] = "Orders";
        // dd($data);
        return view('backend.orders.index', $data);
    }

    public function ordersExcelNormalcustomers()
    {       
        $Alldebit_orders = DB::table("debit_orders")->where("card_number","!=" ,Null)->where("discount" ,0)->orderBy("id", "DESC")->get();
        return view('backend.orders.ordersExcelcustomers', ["Alldebit_orders" => $Alldebit_orders, "title" => "Alldebit_orders"]);
    }

    public function ordersExcelColoredcustomers()
    {
        $Alldebit_orders = DB::table("debit_orders")->where("card_number","!=" ,Null)->where("discount" ,1)->orderBy("id", "DESC")->get();
        return view('backend.orders.ordersExcelcustomers', ["Alldebit_orders" => $Alldebit_orders, "title" => "Alldebit_orders"]);
    }

    public function orders()
    {
        $orders = Sale::where("type", "Incomplete")->orderBy("sales.id", "DESC")->get();
        return view('backend.orders.allorders', ["orders" => $orders, "title" => "Orders"]);
    }

    public function debitOrders()
    {

        $orders = DB::table("debit_orders")->where("status", 0)->orderBy("id", "DESC")->paginate(25);
        foreach ($orders as $orderclient) {
            $orderclient->client = DB::table("customers")->where("id", $orderclient->customer_id)->first();
            ;
        }
        return view('backend.orders.debit_orders', ["orders" => $orders, "title" => "Debit Orders"]);
    }

    public function addToWishlist(Request $request)
    {
        try {
            $isExist = DB::table("wishlist")->where('product_id', $request->productId)
            ->where('customer_id', $request->customer_id)
            ->get()->toArray();
            if (count($isExist) > 0) {
                return false;
            }
            $data = $request->all();
        
            DB::table("wishlist")->insert(
                array(
                    "product_id" => $request->productId,
                    "customer_id" => $request->customerId,
                    "count" => 1,

                )
            );
            return true;

        } catch (\Throwable $th) {
            return $th;
        }

    }

    public function getWishlist(Request $request)
    {
        try {
            $data = $request->all();
            $wishlistarray = DB::table("wishlist")->where('customer_id', $request->customerId)->get()->toArray();



            return $wishlistarray;

        } catch (\Throwable $th) {
            return $th;
        }

    }



    public function ChangeStatus(Request $request)
    {
        $incomplete = $request->input('incomplete');
        $canceled = $request->input('canceled');
        $completed = $request->input('completed');
        $indelivery = $request->input('indelivery');
        $inprogress = $request->input('inprogress');
        $IncompleteIds = array();
        $canceledIds = array();
        $CompletedIds = array();
        $ProgressIds = array();
        $DeliveryIds = array();
        if (!empty($incomplete)) {
            foreach ($incomplete as $todo) {
                $IncompleteIds[] = $todo;
            }
        }
        if (!empty($completed)) {
            foreach ($completed as $inp) {
                $CompletedIds[] = $inp;
            }
        }
        if (!empty($canceled)) {
            foreach ($canceled as $com) {
                $canceledIds[] = $com;
            }
        }
        if (!empty($inprogress)) {
            foreach ($inprogress as $com) {
                $ProgressIds[] = $com;
            }
        }
        if (!empty($indelivery)) {
            foreach ($indelivery as $com) {
                $DeliveryIds[] = $com;
            }
        }

        $indelivery_count = Sale::where('show_order', '1')->where("type", "pos")->where("status", 4)->count();
        $inprograss_count = Sale::where('show_order', '1')->where("type", "pos")->where("status", 3)->count();


        Sale::whereIn('id', $IncompleteIds)->update(array("status" => 2));
        Sale::whereIn('id', $CompletedIds)->update(array("status" => 1));
        Sale::whereIn('id', $canceledIds)->update(array("status" => 0));
        Sale::whereIn('id', $ProgressIds)->update(array("status" => 3));
        Sale::whereIn('id', $DeliveryIds)->update(array("status" => 4));

        $incomplete = Sale::where('show_order', '1')->where("type", "pos")->where("status", 3)->orderBy("id", "DESC")->limit(10)->get()->pluck('id')->map(function ($order) {
            $order = str_pad($order, 4, '0', STR_PAD_LEFT);
            return $order;
        });

        $deliveries = Sale::where('show_order', '1')->where("type", "pos")->where("status", 4)->orderBy("id", "DESC")->limit(10)->get()->pluck('id')->map(function ($order) {
            $order = str_pad($order, 4, '0', STR_PAD_LEFT);
            return $order;
        });

        $completed = Sale::where('show_order', '1')->where("type", "pos")->where("status", 1)->orderBy("id", "DESC")->limit(3)->get()->pluck('id')->map(function ($order) {
            $order = str_pad($order, 4, '0', STR_PAD_LEFT);
            return $order;
        });

        $indelivery_update = Sale::where('show_order', '1')->where("type", "pos")->where("status", 4)->count();
        $inprograss_update = Sale::where('show_order', '1')->where("type", "pos")->where("status", 3)->count();

        $play_sound = false;

        if ($indelivery_count < $indelivery_update || $inprograss_count < $inprograss_update) {
            $play_sound = true;
        }


        broadcast(new UpdateOrderStatusEvent($incomplete, $completed, $deliveries, $play_sound));

        return;
    }

    public function completeSale(Request $request)
    {
        $status = $request["status"]; 
        $saleId = $request["saleId"]; 
        $type = $request["type"]; 
        $paymentType = $request["paymentType"];
        $invoiceAddress = $request["address"];
        $phone = $request["address"]["phone"];
        $name = $request["address"]["firstName"] . " " . $request["address"]["lastName"];      
        $subtotal = $request["subtotal"]; 
        $vat = $request["vat"];
        $delivery_cost = $request["delivery_cost"];
        $discount = $request["discount"];
        $total_cost = $request["total_cost"];
        $email = $request["email"];
        if ($paymentType == 0) {
            $paymentType = 'bank';
        } 
        else if ($paymentType == 1) {
            $paymentType = 'card';
        }

  try {
    $saleInfo = Sale::where('id', $saleId)->first();
    if ($saleInfo) {
        $saleInfo->status = $status; 
        $saleInfo->payment_with = $paymentType;
        $saleInfo->type = $type;
        $saleInfo->amount = $subtotal;
        $saleInfo->vat = $vat;
        $saleInfo->delivery_cost = $delivery_cost;
        $saleInfo->discount = $discount;
        $saleInfo->name = $name;
        $saleInfo->phone = $phone; 
        $saleInfo->total_card = $total_cost;
        $saleInfo->email = $email;
        $saleInfo->invoiceAddress = $invoiceAddress;
        $saleInfo->save();
        $prodItems = json_decode($saleInfo->preSale);
        foreach($prodItems as $item)
        {
            $product = Product::findOrFail($item->product_id);
            if($product)
            {
                $product->quantity -= $item->quantity;
                $product->save();
            }
        }

    }
    return response($saleInfo);
  } catch (\Throwable $th) {
     return $th;
  }
       
       
    
    }

    
    public function checkoutOrder(Request $request)
    {
        $form = $request->all();
        $items = $request->input('items');
        $id = $request->input('id');
        $amount = $request->input('total_cost');
        $status = $request->input('status');
        $type = $request->input('type');
        $delivery_cost = $request->input('delivery_cost');
        $discount = $request->input('discount');
        $sale = Sale::where('id', $id)->first();
        if ($sale) {
            $sale->preSale = $items;
            $sale->amount = $amount;
            $sale->status = $status;
            $sale->type = $type;
            $sale->delivery_cost = $delivery_cost;
            $sale->discount = $discount;
            $sale->save();
        }
        $prdItem = json_decode($items);
        return response($sale);
    }
    public function addOrder(Request $request)
    {
        $form = $request->all();
        $items = $request->input('items');
        $amount = 0;
        foreach ($items as $item) {
            $amount += $item['price'] * $item['quantity'];
        }
        $form['preSale'] = json_encode($items);
         $sale = Sale::createAll($form);

        return response($sale); 
    }
    public function addeditevaluateToCart(Request $request)
    {
        $saleId = $request->input('saleId');
        $item = $request->items;
        $oldEvaluate = $request->oldEvaluate;
        $Idproduct = $request->Idproduct;
        
        try {
            $saleInfo = Sale::where('id', $saleId)->first();
            $preSale = json_decode($saleInfo->preSale, true);
            
            $oldEvaluateArray = json_decode($oldEvaluate, true);
            // Find the index of the product to be deleted
            $deleteIndex = null;
            foreach ($preSale as $index => $saleItem) {
                if ($saleItem['product_id'] == $Idproduct && $saleItem['evaluate'] == $oldEvaluateArray) {
                    $deleteIndex = $index;
                    break;
                }
            }
    
            // Delete the product from $preSale
            if ($deleteIndex !== null) {
                unset($preSale[$deleteIndex]);
            }
    
            // Merge $item with the remaining items in $preSale

            $preSale = array_merge($preSale, [$item]);
    
            // Update the preSale value in the database

            $saleInfo->preSale = json_encode($preSale);
            $saleInfo->save();
    
            return response($saleId);
        } catch (\Throwable $th) {
            return response($th);
        }
    }

    public function deleteItemFromOrder(Request $request)
    {
        
        $form = $request->all();
        $saleId = $request->input('saleId');
        $itemId = $request->input('id');
       
        // $quantity = $request->input('quantity');
        $amount = 0;
        $saleInfo = Sale::where('id', $saleId)->first();
        $oldpreSale = array();

        $oldpreSale = json_decode($saleInfo->preSale, true);

        foreach ($oldpreSale as $key => $item) {
            if ($item['product_id'] == $itemId) {
                unset($oldpreSale[$key]);
                $saleInfo->preSale = json_encode($oldpreSale);
                $saleInfo->save();
            }
        }


        return response($itemId);
    }

    public function deleteAllItemFromOrder(Request $request)
    {
        try {
            $saleId = $request->input('saleId');
            $saleInfo = Sale::where('id', $saleId)->first();
            $oldpreSale = json_decode($saleInfo->preSale, true);
        
            foreach (array_keys($oldpreSale) as $key) {
                unset($oldpreSale[$key]);
            }
        
            $saleInfo->preSale = json_encode($oldpreSale);
            $saleInfo->save();
        
            return response($saleId);
        } catch (\Throwable $th) {
            return $th;
        }
    }
    

    public function addMoreItemToshoppinCart(Request $request)
    {
        try {
            $form = $request->all();
            $saleId = $request->input('saleId');
            $items = $request->input('items');
            $saleInfo = Sale::where('id', $saleId)->first();
            $existingItems = json_decode($saleInfo->preSale, true); // retrieve existing items array from database
    
            // Loop through the new items and update the existing items or add new items
            foreach ($items as $newItem) {
                $existingItemIndex = null;
                $existingItemToUpdate = null;
    
                // Check if the item already exists based on product_id and statusEvaluate
                foreach ($existingItems as $index => $existingItem) {
                    if ($existingItem['product_id'] === $newItem['product_id']) {
                        if ($existingItem['statusEvaluate'] != 0) {
                            // Case 1: Product with statusEvaluate != 0
                            $existingItems[$index]['quantity'] = $newItem['quantity'];
                            continue 2; // Skip to the next iteration
                        } else if($existingItem['statusEvaluate'] == 0 && $newItem['statusEvaluate'] == 0 ) {
                           
                            // Case 2: Product with statusEvaluate == 0
                            $existingEvaluate = json_decode($existingItem['evaluate'], true);
                            $newEvaluate = json_decode($newItem['evaluate'], true);
                         
                            if ($existingEvaluate == $newEvaluate || empty($newEvaluate)) {
                                // Skip if the evaluation has the same data
                                continue 2; // Skip to the next iteration
                            } else{
                                $existingItems[$index]['quantity'] = $newItem['quantity'];
                                continue 2; // Skip to the next iteration
                            }
                        }
                    }
                }
    
                // If no matching existing item is found or the evaluation has different data, add the new item to the existing items array
                $existingItems[] = $newItem;
            }
    
            $amount = 0;
            foreach ($existingItems as $item) {
                $amount += $item['price'] * $item['quantity'];
            }
    
            if ($saleInfo) {
                $saleInfo->amount = $amount;
                $saleInfo->preSale = json_encode($existingItems); // update preSale field in database
                $saleInfo->save();
            }
    
            return response($saleInfo);
        } catch (\Throwable $th) {
            return $th;
        }
      
       
    }

    public function editOrder(Request $request)
    {
        $form = $request->all();
        $saleId = $request->input('saleId');
        $items = $request->input('items');
        // $quantity = $request->input('quantity');
        $amount = 0;
        $saleInfo = Sale::where('id', $saleId)->first();
        $amount = 0;
        foreach ($items as $item) {
            $amount += $item['price'] * $item['quantity'];
        }
        $form['preSale'] = json_encode($items);
        if ($saleInfo) {
            $saleInfo->amount = $amount;
            $saleInfo->preSale = json_encode($items);
            $saleInfo->save();
        }

        return response(json_encode($items));
    }
    public function completeOrderOnline(Request $request)
    {
        $form = $request->all();
        //   return response( $form );
        $saleId = $request->input('saleId');
        $useraddress = $request->input('address');
        $invoiceAddress = $request->input('addressBill');
        $type = $request->input('type');
        $status = $request->input('status');
        // $addresssame =  $request->input('addresssame');

        $items = $request->input('items');

        
        try {
            $delsale = DB::table('sale_items')->where('sale_id', $saleId)->delete();
            $items_decoded = json_decode($items);
            //   return response($items_decoded);
            $amount = 0;
            foreach ($items_decoded as $item) {
                DB::table('sale_items')->insert(
                    [
                        'sale_id' => $saleId,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'size' => $item->size,
                        'price' => $item->price
                    ]
                );
                $amount += $item->price * $item->quantity;
            }
            $saleInfo = Sale::where('id', $saleId)->first();
            if ($saleInfo) {
                $saleInfo->amount = $amount;
                $saleInfo->type = $type;
                $saleInfo->status = $status;
                // $saleInfo->addresssame = 1 ;
                $saleInfo->useraddress = json_encode($useraddress);
                $saleInfo->invoiceAddress = json_encode($invoiceAddress);
                // $saleInfo->preSale = json_encode( $items );
                $saleInfo->save();
            }
            return response($saleInfo);
        } catch (\Throwable $th) {
            return response($th);
        }
    }
    public function evaluateProducts(Request $request)
    {

        try {
            $languages = json_decode(setting_by_key("languages"), true);

            $lang = Session::get("locale");
            if (empty(Session::get("locale")))
                $lang = 'de';

            $result = $request->all();
            $value = $request->input('value');
            $answer1 = $value['answer1'];
            $answer2 = $value['answer2'];
            $answer3 = $value['answer3'];
            $answer4 = $value['answer4'];
            $answer5 = $value['answer5'];
            $error_message =__("site.errormessage");
          
                // اكثر من 3
                if ($answer2 ==1 && $answer4 == 0){
                    $resultOfEvaluate['status'] = false;
                    $error_message = __("site.error_hair_status_heading_message");
                    $resultOfEvaluate['value'] = $error_message;

                    $languages = json_decode(setting_by_key("languages"), true);

                    $lang = Session::get("locale");
                    if (empty(Session::get("locale")))
                        $lang = 'de';
                    $category = Category::where("id", 34)->first();
                 
                        $category->translation = DB::table("categories_translation")->where("category_id",34)
                            ->where("lang", $lang)->first(); 
                    $resultOfEvaluate['category'] =  $category->translation;
                    return response($resultOfEvaluate);


                }

            // طبيعي او مصبوغ
            if ($answer1 == 0 || $answer1 == 1) {
                // لم استخدمه ابدا او اكثر من 6 اشهر
                if ($answer2 == 0 || $answer2 == 2) {
                    // اكثر من 3 سنوات او لم اقم بعمل ميش
                    if ($answer3 == 5 || $answer3 == 6) {
                        // الشعر غير تالف
                        if ($answer4 == 1) {
                            // طول الشعر
                            $product_result_data = Product::where('hairType', 0)->where('category_id', 15)->get();
                            $product_result = "";
                            if ($answer5 >= 13 && $answer5 <= 18) {

                                foreach ($product_result_data as $data) {
                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "1liter") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 10 && $answer5 <= 12) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "250gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 2;
                                        $product_result->titles = $productSize[0];
                                        $product_result->Oldprices = 2 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->prices = $productPrice[1]!=""?$productPrice[1] :$productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 7 && $answer5 <= 9) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 3;
                                        $product_result->Oldprices = 3 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[2]!=""?$productPrice[2] :$productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 4 && $answer5 <= 6) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "250gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);
                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 1 && $answer5 <= 3) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            }
                        } else {
                            $resultOfEvaluate['status'] = false;
                            $error_message = __("site.error_hair_status_heading_message");
                            $resultOfEvaluate['value'] = $error_message;

                            $languages = json_decode(setting_by_key("languages"), true);

                            $lang = Session::get("locale");
                            if (empty(Session::get("locale")))
                                $lang = 'de';
                            $category = Category::where("id", 34)->first();
                         
                                $category->translation = DB::table("categories_translation")->where("category_id",34)
                                    ->where("lang", $lang)->first(); 
                            $resultOfEvaluate['category'] =  $category->translation;
                        }
                    } else {
                        // $product_result_data = Product::where('hairType', 1)->where('category_id', 15)->get();
                        // $product_result = "";

                        ///////////////////////////////////



                         // الشعر غير تالف
                         if ($answer4 == 1) {
                            // طول الشعر
                            $product_result_data = Product::where('hairType', 1)->where('category_id', 15)->get();
                            $product_result = "";
                            if ($answer5 >= 13 && $answer5 <= 18) {

                                foreach ($product_result_data as $data) {
                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "500gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 2;
                                        $product_result->Oldprices = 2 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[1]!=""?$productPrice[1] :$productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 10 && $answer5 <= 12) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "500gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 7 && $answer5 <= 9) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 3;
                                        $product_result->Oldprices = 3 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[2]!=""?$productPrice[2] :$productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 4 && $answer5 <= 6) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 2;
                                        $product_result->Oldprices = 2 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[1]!=""?$productPrice[1] :$productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 1 && $answer5 <= 3) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            }
                        } else {
                            $resultOfEvaluate['status'] = false;
                            $error_message = __("site.error_hair_status_heading_message");
                            $resultOfEvaluate['value'] = $error_message;

                            $languages = json_decode(setting_by_key("languages"), true);

                            $lang = Session::get("locale");
                            if (empty(Session::get("locale")))
                                $lang = 'de';
                            $category = Category::where("id", 34)->first();
                         
                                $category->translation = DB::table("categories_translation")->where("category_id",34)
                                    ->where("lang", $lang)->first(); 
                            $resultOfEvaluate['category'] =  $category->translation;
                        }


                        /////////////////////////////////////

                        // $resultOfEvaluate['status'] = false;
                        // $resultOfEvaluate['value'] = $error_message;
                    }
                } else {
                    $resultOfEvaluate['status'] = false;
                    $error_message = __("site.error_hanaa_message");
                    $resultOfEvaluate['value'] = $error_message;
                    // need edit for close
                    $resultOfEvaluate['button'] = 1;
                    // $category = Category::where("id", 34)->first();
                         
                    // $category->translation = DB::table("categories_translation")->where("category_id",34)
                    //     ->where("lang", $lang)->first(); 
                    // $resultOfEvaluate['category'] =  $category->translation;

                    
                   

                }
            }
            // مميش او مسحوب لونه
            else if ($answer1 == 2 || $answer1 == 3) {
                // لم استخدمه ابدا او اكثر من 6 اشهر
                if ($answer2 == 0 || $answer2 == 2) {
                    //  ليس اكثر من 3 سنوات او لم اقم بعمل ميش  
                    if ( $answer3 == 5) {
                        // الشعر غير تالف
                        if ($answer4 == 1){
                            // طول الشعر
                            $product_result_data = Product::where('hairType', 0)->where('category_id', 15)->get();
                            $product_result = "";
                            if ($answer5 >= 13 && $answer5 <= 18) {

                                foreach ($product_result_data as $data) {
                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "1liter") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 10 && $answer5 <= 12) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "250gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 2;
                                        $product_result->titles = $productSize[0];
                                        $product_result->Oldprices = 2 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->prices = $productPrice[1]!=""?$productPrice[1] :$productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 7 && $answer5 <= 9) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 3;
                                        $product_result->Oldprices = 3 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[2]!=""?$productPrice[2] :$productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 4 && $answer5 <= 6) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "250gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);
                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 1 && $answer5 <= 3) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            }
                    }else {
                        $resultOfEvaluate['status'] = false;
                        $resultOfEvaluate['value'] = $error_message;
                    }
                    } else if($answer3 != 5 || $answer3 != 6){
                        if ($answer4 == 1) {
                            // طول الشعر
                            $product_result_data = Product::where('hairType', 1)->where('category_id', 15)->get();
                            $product_result = "";
                            if ($answer5 >= 13 && $answer5 <= 18) {

                                foreach ($product_result_data as $data) {
                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "500gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 2;
                                        $product_result->Oldprices = 2 * $productPrice[0];
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[1]!=""?$productPrice[1] :$productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 10 && $answer5 <= 12) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "500gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 7 && $answer5 <= 9) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 3;
                                        $product_result->Oldprices = 3 * $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[2]!=""?$productPrice[2] :$productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 4 && $answer5 <= 6) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 2;
                                        $product_result->Oldprices = 2 * $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[1]!=""?$productPrice[1] :$productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            } else if ($answer5 >= 1 && $answer5 <= 3) {
                                //    return response($product_result_data);
                                foreach ($product_result_data as $data) {

                                    $productSize = json_decode($data->titles);
                                    if ($productSize[0] == "120gr") {

                                        $product_result = $data;
                                        $productPrice = json_decode($product_result->prices);

                                        $product_result->quantity = 1;
                                        $product_result->Oldprices = 1 * $productPrice[0];
                                        $product_result->Allprices = $productPrice;
                                        $product_result->OldpricesForOne = $productPrice[0];
                                        $product_result->titles = $productSize[0];
                                        $product_result->prices = $productPrice[0];
                                        $resultOfEvaluate['status'] = true;
                                        $resultOfEvaluate['value'] = $product_result;
                                        return response($resultOfEvaluate);
                                    } else {
                                        $resultOfEvaluate['status'] = false;
                                        $resultOfEvaluate['value'] = $error_message;
                                    }
                                }
                            }
                        } else {
                            $resultOfEvaluate['status'] = false;
                            $resultOfEvaluate['value'] = $error_message;
                        }
                     
                    }
                      else  {
                        $resultOfEvaluate['status'] = false;
                        $resultOfEvaluate['value'] = $error_message;
                    }
                } else {
                    $resultOfEvaluate['status'] = false;
                    $resultOfEvaluate['value'] = $error_message;
                }
            } else {
                $resultOfEvaluate['status'] = false;
                $resultOfEvaluate['value'] = $error_message;
            }



            return response($resultOfEvaluate);
        } catch (\Throwable $th) {
            $resultOfEvaluate['status'] = false;
            $resultOfEvaluate['value'] = $th;
            return response($resultOfEvaluate);
        }
     
    }
}