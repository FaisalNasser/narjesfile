<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Category;
use App\Product;
use App\Setting;
use Validator;
use DB,
Auth,
Mail;
use App\User;
use App\Table;
use Session;
use PDF;
use QrCode;
use App\Mail\dhlEmail;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        // dd($request);
        $keyword = $request->get('q', '');
        $data["q"] = $keyword;
        $ids = array();
        if ($keyword) {
            $users = User::where("role_id", "!=", 4)->where("name", "like", "%$keyword%")->get();
            foreach ($users as $user) {
                $ids[] = $user->id;
            }
        }




        if (Auth::user()->role_id == 1) {

            if (!empty($ids)) {
                $sales = Sale::whereIn("cashier_id", $ids)->groupBy("sales.id")->orderBy("sales.id", "DESC")->paginate(25);
            } else {
                $sales = Sale::orderBy("sales.id", "DESC")->paginate(25);
            }

            $sales = !empty($keyword) ? $sales->appends(['q' => $keyword]) : $sales;
            $data['sales'] = $sales;
        } else {
            $data['sales'] = Sale::where("cashier_id", Auth::user()->id)->orderBy("sales.id", "DESC")->paginate(25);
        }
        //dd($data);

        return view('backend.sales.index', $data);

        // if(Auth::user()->role_id == 1) {
        //     $data['sales'] = Sale::select("*" , "sales.id as id")->where("type", "pos")->leftJoin("sale_items as s" , "s.sale_id" , '=', "sales.id" )->orderBy("sales.id", "DESC")->paginate(25);
        // } else {
        //     $data['sales'] = Sale::where("cashier_id", Auth::user()->id)->leftJoin("sale_items as s" , "s.sale_id" , '=', "sales.id" )->orderBy("sales.id", "DESC")->paginate(25);
        // }

        // return view('backend.sales.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages  = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale"))) $lang = $languages[0];
        $debit_order = array();
        if (!empty($_GET["debit_id"])) {
            $debit_id = $_GET["debit_id"];
            $debit_order = DB::table("debit_orders")->where("id", $debit_id)->first();
        }
        $data["debit_order"] = $debit_order;
        $categories = Category::get();
        foreach ($categories as $cat) {
            $cat->translation  = DB::table("categories_translation")->where("category_id", $cat->id)
                ->where("lang", $lang)->first();
        }
        $data['categories'] = $categories;

        $products = Product::get();
        foreach ($products as $pro) {
            $pro->translation  = DB::table("products_translation")->where("product_id", $pro->id)
                ->where("lang", $lang)->first();
        }
        $data['products'] = $products;
        $data['tables'] = DB::table("tables")->get();
        return view('backend.sales.create', $data);
    }
 
    public function bill($id)
    {
    
        try {
            $languages  = json_decode(setting_by_key("languages"), true);
            $lang = Session::get("locale");
            if (empty(Session::get("locale"))) $lang = $languages[0];
            $sale = Sale::find($id);
            if($sale->card_number ==Null)
            {
                $products = json_decode($sale->preSale, true); // Decode the JSON string into an associative array

            }
            else{
                $products = $sale->items;
            }
            foreach ($products as &$pro) {
                $pro['translation'] = DB::table("products_translation")
                    ->where("product_id", $pro['product_id'])
                    ->where("lang", $lang)
                    ->first();
                    if ( $pro['translation'] === null) {
                        $pro['translation'] = DB::table("products_translation")
                            ->where("product_id", $pro['product_id'])
                            ->where("lang", "ar")
                            ->first();
                    }
            
                $pro['evaluate'] = json_decode($pro['evaluate'], true);
            
                if (!empty($pro['evaluate'])) {
                    $evaluate_result = $pro['evaluate'];
            
                    $a1 = __("site.hair_type1");
                    $a2 = __("site.not_used");
                    $a3 = __("site.month_before");
                    $a4 = __("site.Yes");
            
                    // Modify the values of answer1, answer2, answer3, and answer4
                    if (isset($evaluate_result['answer1']) && $evaluate_result['answer1'] == 0) {
                        $a1 = __("site.hair_type1");
                    } else if (isset($evaluate_result['answer1']) && $evaluate_result['answer1'] == 1) {
                        $a1 = __('site.hair_type2');
                    } else if (isset($evaluate_result['answer1']) && $evaluate_result['answer1'] == 2) {
                        $a1 = __('site.hair_type3');
                    } else if (isset($evaluate_result['answer1']) && $evaluate_result['answer1'] == 3) {
                        $a1 = __('site.hair_type4');
                    }
            
                    if (isset($evaluate_result['answer2']) && $evaluate_result['answer2'] == 0) {
                        $a2 = __("site.not_used");
                    } else if (isset($evaluate_result['answer2']) && $evaluate_result['answer2'] == 1) {
                        $a2 = __('site.more6month');
                    } else if (isset($evaluate_result['answer2']) && $evaluate_result['answer2'] == 2) {
                        $a2 = __('site.less6month');
                    }
            
                    if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 0) {
                        $a3 = __("site.month_before");
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 1) {
                        $a3 = __('site.month_6before');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 2) {
                        $a3 = __('site.year_before');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 3) {
                        $a3 = __('site.year_2before');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 4) {
                        $a3 = __('site.year_3before');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 5) {
                        $a3 = __('site.year_3more');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 6) {
                        $a3 = __('site.not_use_color_remove');
                    }
            
                    if (isset($evaluate_result['answer4']) && $evaluate_result['answer4'] == 0) {
                        $a4 = __("site.Yes");
                    } else if (isset($evaluate_result['answer4']) && $evaluate_result['answer4'] == 1) {
                        $a4 = __('site.No');
                    }
            
                    $evaluate_result['answer1'] = $a1;
                    $evaluate_result['answer2'] = $a2;
                    $evaluate_result['answer3'] = $a3;
                    $evaluate_result['answer4'] = $a4;
                    // Remove answer0 from the evaluate array
                    unset($evaluate_result['answer0']);
                    $pro['evaluate'] = $evaluate_result;
                }
            }
            
            $productitems = array();
            $qtys = array();
            foreach ($products as $item) {
                $productitems[$item['product_id']] = $item['product_id'];
                $qtys[$item['product_id']] = $item['quantity'];
            }
            $data['sale'] = $sale;
            $data['products'] = $products;
            $data['productitems'] = $productitems;
            $data['qtys'] = $qtys;
            // return $data ;
            return view('backend.sales.bill', $data);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return abort(404);
        }
    }
  



    public function receipt($id)
    {
        try {
            $languages  = json_decode(setting_by_key("languages"), true);
            $lang = Session::get("locale");
            if (empty(Session::get("locale"))) $lang = $languages[0];
            $sale = Sale::find($id);
            $products = $sale->items;
            $productprint = [];

            $printers = DB::table("printer_users")
                ->where('user_id', auth()->user()->id)
                ->join('printers', 'printer_users.printer_id', '=', 'printers.id')
                ->get();
            //  dd($printers);
            foreach ($products as $pro) {
                $pro->translation  = DB::table("products_translation")->where("product_id", $pro->product_id)
                    ->where("lang", $lang)->first();
            }

            if ($printers) {
                foreach ($printers as $print) {
                    if (!$print->isFesh) {
                        $print->cat = [];
                        $print->ids = [];
                        foreach ($products as $pro) {
                            $pro->translation  = DB::table("products_translation")->where("product_id", $pro->product_id)
                                ->where("lang", $lang)->first();
                            $productCat = DB::table("products")->where("id", $pro->product_id)->first();

                            if (in_array($productCat->category_id, json_decode($print->category_id))) {
                                // array_push( $print->cat,$pro );
                                array_push($print->ids, $pro->id);
                                array_push($print->cat, $pro);

                                if (in_array($print, $productprint)) {
                                } else {
                                    array_push($productprint, $print);
                                    //array_push( $print->cat,$pro );

                                    // if(in_array($pro ,  $print->cat))
                                    //   {
                                    //       if($pro->id != $print->cat->id)

                                    //       {
                                    //          array_push( $print->cat,$pro );

                                    //       }

                                    //   }
                                    //   else
                                    //    {
                                    //      array_push( $print->cat,$pro );
                                    //     }
                                }
                                if (in_array($pro->id, $print->ids)) {
                                } else {
                                    array_push($print->cat, $pro);
                                }
                            }
                        }
                    }
                    
                    // else {
                    //     $data['PrinterFesh'] = $print->destination;
                    // }
                }
            } else {
                return abort(404);
            }
                 $printersFesh =  DB::table("printer_users")
                ->where('user_id', auth()->user()->id)
                ->join('printers', 'printer_users.printer_id', '=', 'printers.id')
                ->get();
            foreach ($printersFesh as $print) {
                if($print->isFesh)
                {
                     $data['PrinterFesh'] = $print->destination;
                      break;
                }
               else{
                   $data['PrinterFesh'] = "";
               }
            }

            $data['electronic_invoice'] = Setting::where("language" , $lang)->where("key","sa_electronic_invoice")->get();
            $data['facility_name'] = Setting::where("language" , $lang)->where("key","facility_name")->get();
            $data['printers'] = $productprint;
            // $data['PrinterFesh'] = $print->destination;
            $data['sale'] = $sale;
            $data['products'] = $products;
           

            return view('backend.sales.receipt', $data);
        } catch (\Throwable $th) {
            info($th->getMessage());
            return abort(404);
        }
    }
    public function debit($id)
    {
        $order = DB::table("debit_orders")->where("status", 0)->where("id", $id)->first();
        if (!empty($order->customer_id)) {
            $client = DB::table("customers")->where("id", $order->customer_id)->first();
            $data['client'] = $client;
        }


        $data['sale'] = $order;

        return view('backend.sales.debit', $data);
    }

    public function completeSale(Request $request)
    {
        // dd($request);
        $form = $request->all();
        $items = $request->input('items');
        $amount = 0;
        foreach ($items as $item) {
            $amount += $item['price'] * $item['quantity'];
        }
        $amount += $request->input('vat') + $request->input('delivery_cost') - $request->input('discount');
        $form['amount'] = $amount;
        $form['discount'] = $request->discount;
        $form['phone'] = $request->phone;

        if (!empty($request->input("orderamount") and $request->input("orderamount") == "free")) {
            $form['discount'] = $amount;
            $form['amount'] = 0;
            $form['change'] = 0;
        }



        $rules = Sale::$rules;
        $rules['items'] = 'required';

        $validator = Validator::make($form, $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors()->all(),
                ],
                400
            );
        }

        $form['status'] = $request->show_order ? 3 : 1;
        $form['total_card'] = $request->total_card ?? 0;
        $form['payment_with'] = $request->total_card  > 0 && $request->total_given == 0  ? 'card' : 'cash';
        $form["receive_type"] = "inRestaurant";
        $sale = Sale::createAll($form);

        return url("sales/receipt/" . $sale->id);
    }

    public function cancel($id)
    {
        Sale::where("id", $id)->update(array("status" => 0));
        return redirect("sales");
    }

    public function complteOrder(Sale $sale)
    {
        $sale->update(['status' => 1]);
        return redirect("sales");
    }


    public function holdOrder(Request $request)
    {
        $id = $request->input("id");
        $comment = $request->input("comment");
        $table_id = $request->input("table_id");
        $cart = json_encode($request->input("cart"));

        if ($id) {

            DB::table("hold_order")->where("id", $id)->update(array("table_id" => $table_id,  "cart" => $cart, "comment" => $comment, "user_id" => Auth::user()->id));
            return "success";
            exit;
        }
        if ($table_id == 0) {
            DB::table("hold_order")->insert(array("table_id" => $table_id, "cart" => $cart, "comment" => $comment, "user_id" => Auth::user()->id));
        } else {
            $table =  Table::where("id", $table_id)->first();
            if ($table->status == 1) {
                return "Table already on Hold";
                exit;
            }
            DB::table("hold_order")->insert(array("table_id" => $table_id, "cart" => $cart, "comment" => $comment, "user_id" => Auth::user()->id));
            Table::where("id", $table_id)->update(array("status" => 1));
        }





        return "success";
    }

    public function viewHoldOrder(Request $request)
    {
        $id = $request->input("id");
        $order = DB::table("hold_order")->where("id", $id)->first();

        echo $order->cart;
    }

    public function holdOrders(Request $request)
    {
        $orders = DB::table("hold_order")->where("table_id", 0)->where("status", 0)->get();
        foreach ($orders as $order) {
            $user = User::find($order->user_id);
            $table = DB::table("tables")->where("id", $order->table_id)->first();
            $order->username = "";
            if (!empty($user)) {
                $order->username = $user->name;
                $order->table = "No Table Found";
                if (!empty($table))
                    $order->table = $table->table_name;
                $order->comment = $order->comment;
            }
        }
        echo json_encode($orders);
    }

    public function removeHoldOrder(Request $request)
    {
        $id = $request->input("did");
        DB::table("hold_order")->where("id", $id)->update(array("status" => 1));
    }

    public function removeDebitOrder(Request $request)
    {

        $id = $request->input("id");

        DB::table("debit_orders")->where("id", $id)->delete();
    }
    public function deleteDebitOrder($id)
    {

        DB::table("debit_orders")->where("id", $id)->delete();
        $orders = DB::table("debit_orders")->where("card_number","!=" ,Null)->where("discount" ,0)->orderBy("id", "DESC")->get();

        // $orders = Sale::where("type", "Incomplete")->where("card_number","!=" ,Null)->where("receive_type" ,0)->orderBy("sales.id", "DESC")->get();
        return view('backend.orders.ordersExcelcustomers', ["orders" => $orders, "title" => "Orders"]);
       
    }
    public function debitOrder(Request $request)
    {
        // dd($request->all());
        $id = $request->input("id");
        $comment = $request->input("comment");
        $table_id = $request->input("table_id");
        $cart = json_encode($request->input("cart"));
        $customer_id = $request->input("customer_id");
        $changing = $request->input("change");
        $total_card = $request->input("total_card") ?? 0;
        $type = $request->input("type");
        $total_given = $request->input("total_given");
        $amount = $request->input("amount");
        $data_id = $id;
        if ($id) {
            DB::table("debit_orders")->where("id", $id)
                ->update(array("table_id" => $table_id,  "cart" => $cart, "changing" => $changing, "type" => $type, "total_given" => $total_given, "total_card" => $total_card, "amount" => $amount, "comment" => $comment, "customer_id" => $customer_id, "user_id" => Auth::user()->id, 'discount' => $request->discount ?? 0, 'card_number' => $request->card_number));
            // return DB::table("debit_orders")->where("id", $id)->first();
            // exit;
            return url("sales/debit/" . $data_id);
        } else {
            $data_id =  DB::table("debit_orders")->insertGetId(array("table_id" => $table_id,  "cart" => $cart, "changing" => $changing, "type" => $type, "total_given" => $total_given, "total_card" => $total_card, "amount" => $amount, "comment" => $comment, "customer_id" => $customer_id, "user_id" => Auth::user()->id, 'discount' => $request->discount ?? 0, 'card_number' => $request->card_number));
            return url("sales/debit/" . $data_id);
        }
    }
    public function confirmdebitorder($id)
    {
        $confirmdepitorder = 1;



        // $form = $request->all();
        // $items = $request->input('items');
        // $amount = 0;
        // foreach ($items as $item) {
        //     $amount += $item['price'] * $item['quantity'];
        // }
        // $form['preSale'] = json_encode($items);
      
        //  $sale= DB::table("sales")->insert(array("preSale" => $form['preSale']));
        // Create a new Sale record

          $debit_orders =  DB::table("debit_orders")
          ->where("id", $id)->first();

                  $sale = Sale::create([
                'status' => 2,
                'email' => $debit_orders->email,
                'name' => $debit_orders->name,
                'phone' => $debit_orders->mobile_number,
                'useraddress' => $debit_orders->cart ,
                'invoiceAddress' => $debit_orders->cart  ,
                'addresssame' =>1,
                'card_number' => $debit_orders->card_number,
                'amount' =>$debit_orders->amount,
                'delivery_cost' => 0,
                'type'=>$debit_orders->type,
                'receive_type' =>$debit_orders->discount,
                'comment' =>$debit_orders->comment,
                 ]);

          DB::table("debit_orders")
          ->where("id", $id)
          ->update([
              "confirmdepitorder" => $confirmdepitorder,
              "sale_id" => $sale->id // Assuming you have a column named "sale_id" in the debit_orders table
          ]);

       if ($debit_orders->discount == 0) {
        $Alldebit_orders = DB::table("debit_orders")->where("card_number","!=" ,Null)->where("discount" ,0)->orderBy("id", "DESC")->get();

        return view('backend.orders.ordersExcelcustomers', ["Alldebit_orders" => $Alldebit_orders, "title" => "Alldebit_orders"]);
       }else{
        $Alldebit_orders = DB::table("debit_orders")->where("card_number","!=" ,Null)->where("discount" ,1)->orderBy("id", "DESC")->get();

        return view('backend.orders.ordersExcelcustomers', ["Alldebit_orders" => $Alldebit_orders, "title" => "Alldebit_orders"]);

       }
    } 
    public function editordersExcel($id)
    {
        $languages  = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale"))) $lang = $languages[0];
        $languages  = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale"))) $lang = $languages[0];
        $sale = Sale::find($id);
        $products = $sale->items;
        foreach ($products as $pro) {
            $pro->translation  = DB::table("products_translation")->where("product_id", $pro->product_id)
                ->where("lang", $lang)->first();
        }
        $productitems = array();
        $qtys = array();
        foreach ($products as $item) {

            $productitems[$item->product_id] = $item->product_id;
            $qtys[$item->product_id] = $item->quantity;
        }
        $data['sale'] = $sale;
        $data['products'] = $products;
        $data['productitems'] = $productitems;
        $data['qtys'] = $qtys;
        return view('backend.reports.sales.editordersExcel',  $data);
    } 
    public function view($id)
    {
        $languages  = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale"))) $lang = $languages[0];
        $sale = Sale::find($id);
        $products = [];
        $products = json_decode($sale->preSale, true); // Decode the JSON string into an associative array
        if (!is_null($products)) {
            foreach ($products as &$pro) {
                $pro['translation'] = DB::table("products_translation")
                    ->where("product_id", $pro['product_id'])
                    ->where("lang", $lang)
                    ->first();
                    if ( $pro['translation'] === null) {
                        $pro['translation'] = DB::table("products_translation")
                            ->where("product_id", $pro['product_id'])
                            ->where("lang", "ar")
                            ->first();
                    }
            
                $pro['evaluate'] = json_decode($pro['evaluate'], true);
            
                if (!empty($pro['evaluate'])) {
                    $evaluate_result = $pro['evaluate'];
            
                    $a1 = __("site.hair_type1");
                    $a2 = __("site.not_used");
                    $a3 = __("site.month_before");
                    $a4 = __("site.Yes");
            
                    // Modify the values of answer1, answer2, answer3, and answer4
                    if (isset($evaluate_result['answer1']) && $evaluate_result['answer1'] == 0) {
                        $a1 = __("site.hair_type1");
                    } else if (isset($evaluate_result['answer1']) && $evaluate_result['answer1'] == 1) {
                        $a1 = __('site.hair_type2');
                    } else if (isset($evaluate_result['answer1']) && $evaluate_result['answer1'] == 2) {
                        $a1 = __('site.hair_type3');
                    } else if (isset($evaluate_result['answer1']) && $evaluate_result['answer1'] == 3) {
                        $a1 = __('site.hair_type4');
                    }
            
                    if (isset($evaluate_result['answer2']) && $evaluate_result['answer2'] == 0) {
                        $a2 = __("site.not_used");
                    } else if (isset($evaluate_result['answer2']) && $evaluate_result['answer2'] == 1) {
                        $a2 = __('site.more6month');
                    } else if (isset($evaluate_result['answer2']) && $evaluate_result['answer2'] == 2) {
                        $a2 = __('site.less6month');
                    }
            
                    if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 0) {
                        $a3 = __("site.month_before");
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 1) {
                        $a3 = __('site.month_6before');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 2) {
                        $a3 = __('site.year_before');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 3) {
                        $a3 = __('site.year_2before');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 4) {
                        $a3 = __('site.year_3before');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 5) {
                        $a3 = __('site.year_3more');
                    } else if (isset($evaluate_result['answer3']) && $evaluate_result['answer3'] == 6) {
                        $a3 = __('site.not_use_color_remove');
                    }
            
                    if (isset($evaluate_result['answer4']) && $evaluate_result['answer4'] == 0) {
                        $a4 = __("site.Yes");
                    } else if (isset($evaluate_result['answer4']) && $evaluate_result['answer4'] == 1) {
                        $a4 = __('site.No');
                    }
            
                    $evaluate_result['answer1'] = $a1;
                    $evaluate_result['answer2'] = $a2;
                    $evaluate_result['answer3'] = $a3;
                    $evaluate_result['answer4'] = $a4;
                    // Remove answer0 from the evaluate array
                    unset($evaluate_result['answer0']);
                    $pro['evaluate'] = $evaluate_result;
                }
            }
            $productitems = array();
            $qtys = array();
            if (!is_null($products)) {
                foreach ($products as $item) {
                    $productitems[$item['product_id']] = $item['product_id'];
                    $qtys[$item['product_id']] = $item['quantity'];
                }
            }
        }else{
            $products = $sale->items;
            foreach ($products as $pro) {
                $pro->translation  = DB::table("products_translation")->where("product_id", $pro->product_id)
                    ->where("lang", $lang)->first();
                   $pro->statusEvaluate = 4;
            }
            $productitems = array();
            $qtys = array();
            foreach ($products as $item) {
    
                $productitems[$item->product_id] = $item->product_id;
                $qtys[$item->product_id] = $item->quantity;
            }
        }
        $data['sale'] = $sale;
        $data['products'] = $products;
        $data['productitems'] = $productitems;
        $data['qtys'] = $qtys;
        return view('backend.reports.sales.view', $data);
    } 
    public function edit($id)
    {
        $languages  = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale"))) $lang = $languages[0];
        $sale = Sale::find($id);
        $products = $sale->items;
        foreach ($products as $pro) {
            $pro->translation  = DB::table("products_translation")->where("product_id", $pro->product_id)
                ->where("lang", $lang)->first();
        }
        $productitems = array();
        $qtys = array();
        foreach ($products as $item) {

            $productitems[$item->product_id] = $item->product_id;
            $qtys[$item->product_id] = $item->quantity;
        }
        $data['sale'] = $sale;
        $data['products'] = $products;
        $data['productitems'] = $productitems;
        $data['qtys'] = $qtys;
        return view('backend.reports.sales.edit', $data);
    }
    public function update(Request $request)
    {
        $id = $request->input("sid");
        $userAddressUpdates = [
            "firstName" => $request->input("firstName"),
            "lastName" => $request->input("lastName"),
            "street" => $request->input("street"),
            "zipCode" => $request->input("zipCode"),
            "city" => $request->input("city"),
            "country" => $request->input("country"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
        ];
        
        $sale = Sale::find($id);
        
        if ($sale) {
            $userAddress = json_decode($sale->useraddress, true);
        
            foreach ($userAddressUpdates as $key => $value) {
                if (array_key_exists($key, $userAddress)) {
                    $userAddress[$key] = $value;
                }
            }
            // return  $userAddress ;
            $sale->update([
                "useraddress" => json_encode($userAddress),
                "invoiceAddress" => json_encode($userAddress) // Convert the modified array back to JSON
            ]);

       
        $p_Id = $request->input("qtys");
        if (!empty($p_Id)) {
            foreach ($p_Id  as $k => $item) {
                $sale =   DB::table("sale_items")->where("sale_id", $id)->where("product_id", $k)->update(array('quantity' => $item));
            }
        }

        $url = url('reports/sales/' . $id);
        return redirect($url)
            ->with('message-success', 'Edit!');
    }
   }
    public function saveitem(Request $request)
    {
        
        $dataSale = $request->input("dataSale");
        $datatitle = $request->input("datatitle");
        $dataprice = $request->input("dataprice");
        $dataproduct = $request->input("dataproduct");
        $qty = $request->input("qty");

        DB::table('sale_items')->insert(
            [
                'sale_id' => $dataSale,
                'product_id' => $dataproduct,
                'quantity' => $qty,
                'size' => $datatitle,
                'price' => $dataprice
            ]
        );
        $amount = 0;
        $sale = Sale::find($dataSale);
        $products = $sale->items;
        foreach ($products as $item) {
            $amount += $item->quantity * $item->price;
        }
        Sale::where("id", $dataSale)->update(array("amount" => $amount));
       

        if (app()->getLocale() == 'ar') {
            $errors = array(
                "error" => 0,
                "message" => "شكراً على طلبكم , جاري العمل على تحضيره"
            );
        } else {
            $errors = array(
                "error" => 0,
                "message" => "Thank you for your request. Work is underway"
            );
        }

        echo  json_encode($errors);
        exit;
    }
    public function deleteitem(Request $request)
    {
        $sid = $request->input("sid");
        $pr = $request->input("pr");
        echo $sid;
        echo $pr;
        DB::table('sale_items')->where('sale_id', $sid)->where('product_id', $pr)->delete();

        return response()->json([
            'message' => 'Data deleted successfully!', 'sid' => $sid, 'pr' => $pr
        ]);
    }

   public function changeOrderStatus(Request $request)
    {
       
        $id = $request->input("id");
        $status = $request->input("status");
        $emailUser = $request->input("emailUser");
        $firstName = $request->input("firstName");
        $lastName = $request->input("lastName");
        $sale = Sale::find($id);
    
        $sale->status =  $status;
        $sale->save();
           $content = array(
            "firstName" => $firstName,
            "lastName" => $lastName,
             );
        if ($status == "4") {
            Mail::to($emailUser)->send(new dhlEmail($content)); 
          }
        
        echo  json_encode(true);
        exit;
    }
}
