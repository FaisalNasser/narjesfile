<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Setting;
use Illuminate\Http\Request;
use App\Category;
use App\Models\Review;
use App\Product;
use App\ContactMessage;
use App\Customer;
use App\Page;
use App\Sale;
use DB,
Auth,
Mail;
use App\Mail\ChangePasswordEmail;
use App\Mail\Test;
use App\Mail\Contact;
use View;
use Session;
use Artisan;
use Illuminate\Support\Facades\Queue;
// use Carbon\Carbon;
use JetBrains\PhpStorm\Language;
use stdClass;
use App\Mail\TestEmail;
use App\Mail\OrderEmail;
use App\Mail\MethodStatementNaturalEmail;
use App\Mail\MethodStatementMamishEmail;
use App\Mail\NewslettersEmail;   
use App\Mail\MethodStatementMamishNaturalEmail; 
use App\Mail\OrderExelEmail;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendNaturalEmailJob;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon; // Import the Carbon class
use Illuminate\Support\Facades\Bus; // Import the Bus facade


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $setting_color = Setting::where('key', 'color')->get();
        View::share('setting_color', $setting_color);
    }
    public function index1($id)
    {
        $saleId = $id;
        $enable = 1;
        $lang = Session::get("locale");
        ;
        $languages = json_decode(setting_by_key("languages"), true);

        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $categories = Category::orderBy("sort", "Desc")->where("enable", $enable)->get();
        foreach ($categories as $cat) {
            $cat->translation = DB::table("categories_translation")->where("category_id", $cat->id)
                ->where("lang", $lang)->first();
            $products = Product::where("category_id", $cat->id)->where("is_delete", 0)->orderBy("sort", "Desc")->where("enable", $enable)->get();
            foreach ($products as $pro) {
                $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)
                    ->where("lang", $lang)->first();
            }

            $cat->products = $products;
        }

        // return [$categories,$products];
        $reviews = Review::get();

        $saleInfo = Sale::where('id', $saleId)->first();
        $existingItems = json_decode($saleInfo->preSale, true);
        
        foreach ($existingItems as &$value) {
            $value['translation'] = DB::table("products_translation")->where("product_id", $value['product_id'])
                ->where("lang", $lang)->first();
        }
        
        $Items = json_encode($existingItems);
        $count = count($existingItems);
        return view('home1', compact('categories', 'reviews', 'saleId', 'count','Items'));
    }

    public function index($id = null)
    {
                if ($id == null) {
                    $enable = 1;
                    $lang = Session::get("locale");
                
                    $languages = json_decode(setting_by_key("languages"), true);
            
                    if (empty(Session::get("locale")))
                        $lang ='de';
                    $categories = Category::orderBy("sort", "Desc")->where("enable", $enable)->get();
                    foreach ($categories as $cat) {
                        $cat->translation = DB::table("categories_translation")->where("category_id", $cat->id)
                            ->where("lang", $lang)->first();
                        $products = Product::where("category_id", $cat->id)->where("is_delete", 0)->orderBy("sort", "Desc")->where("enable", $enable)->get();
                        // foreach ($products as $pro) {
                        //     $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)
                        //         ->where("lang", $lang)->first();
                        // }
            
                        $cat->products = $products;
                    }
                    $reviews = Review::get();
                    $saleId =0;
                    $count =0;
                    $Items =0;
                }
                else {
                    $saleId = $id;
                    $enable = 1;
                    $lang = Session::get("locale");
                
                    $languages = json_decode(setting_by_key("languages"), true);
            
                    if (empty(Session::get("locale")))
                        $lang ='de';
                    $categories = Category::orderBy("sort", "Desc")->where("enable", $enable)->get();
                    foreach ($categories as $cat) {
                        $cat->translation = DB::table("categories_translation")->where("category_id", $cat->id)
                            ->where("lang", $lang)->first();
                        $products = Product::where("category_id", $cat->id)->where("is_delete", 0)->orderBy("sort", "Desc")->where("enable", $enable)->get();
                        // foreach ($products as $pro) {
                        //     $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)
                        //         ->where("lang", $lang)->first();
                        // }
            
                        $cat->products = $products;
                    }
                    $reviews = Review::get();
            
                    $saleInfo = Sale::where('id', $saleId)->first();
                    $existingItems = json_decode($saleInfo->preSale, true);
                    
                    foreach ($existingItems as &$value) {
                        $value['quantity'] = intval($value['quantity']);
                        $value['statusEvaluate'] = intval($value['statusEvaluate']);
                        
                        $translationvalue = DB::table("products_translation")
                            ->where("product_id", $value['product_id'])
                            ->where("lang", $lang)
                            ->first();
                        
                        if ($translationvalue === null) {
                            $translationvalue = DB::table("products_translation")
                                ->where("product_id", $value['product_id'])
                                ->where("lang", "ar")
                                ->first();
                        }
                        
                        $value['translation'] = $translationvalue;
                    }
                    $Items = json_encode($existingItems);
                    // return $Items;
                    $count = count($existingItems);
                }
            
        // return $categories;
        
        return view('home', compact('categories', 'reviews','saleId', 'count','Items'));
    }
    public function productDetails($id)
    {
        $languages = json_decode(setting_by_key("languages"), true);
        $enable = 1;
        $lang = $lang = Session::get("locale");
        ;
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $product = Product::where("is_delete", 0)
            ->where("id", $id)
            ->where("enable", 1)->first();
        $product->translation = DB::table("products_translation")->where("product_id", $id)
            ->where("lang", $lang)->first();
        $cat_Id = $product->category_id;
        // $RelatedProducts = "";
        $RelatedProducts = Product::where("is_delete", 0)
            ->where("enable", $enable)->where("category_id", $cat_Id)->orderBy("name", "ASC")->get();
        foreach ($RelatedProducts as $pro) {
            $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)
                ->where("lang", $lang)->first();
        }
        return view('pages.product', compact('product', 'RelatedProducts'));
    }
    public function about()
    {
        $languages = json_decode(setting_by_key("languages"), true);

        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $page = Page::where("language", $lang)->where("slug", "about-us")->first();
        return view('pages.about', ['page' => $page]);
    }
    public function evaluate()
    {
        return view('pages.evaluate');
    }
    public function formClientNormal(){
        $recive_type = 0 ;
        return view('pages.formClient' , compact('recive_type'));
    }
    public function formClientColored(){
        $recive_type = 1 ;

        return view('pages.formClient',compact('recive_type'));
    }
    
    public function formClientSave(Request $request){
        
        
        	try{
        	    
        	      $data = $request->all();
// dd($data);
        $address = new stdClass();
        $address->firstName = $request->first_name_lgin;
        $address->lastName = $request->last_name;
        $address->street = $request->street_name;
        $address->zipCode = $request->postcode_name;
        $address->city = $request->city_name;

        $address->country = $request->country_name;
        $address->email = $request->email;
        $address->phone = $request->phone_name;

        // Convert the object to a JSON string
        $jsonAddress = json_encode($address);
        // $sale = Sale::create([
        //     'status' => 2,
        //     'email' => $request->email,
        //     'name' => $request->first_name_lgin . $request->last_name,
        //     'phone' => $request->phone_name,
        //     'useraddress' => $jsonAddress ,
        //     'invoiceAddress' =>  $jsonAddress ,
        //     'addresssame' =>1,
        //     'card_number' => $request->bank_account,
        //     'amount' =>$request->amount,
        //     'delivery_cost' => 0,
        //     'type'=>'Incomplete',
        //     'receive_type' =>$request->recive_type
        // ]);
        
        $data_id =  DB::table("debit_orders")->insertGetId(
            array(
            "name" =>$request->first_name_lgin . " " . $request->last_name,
            'mobile_number' => $request->phone_name,
            'email' => $request->email,
            "cart" => $jsonAddress ,
            'comment' => $request->comment,
            'status' => 2,
            'type'=>'Incomplete',
            "amount" =>$request->amount,
            'discount' => $request->recive_type, 
            'card_number' => $request->bank_account,
            'confirmdepitorder' => 0));
    

       
        if($request->recive_type == 0)
        {
             $content = array(
            "firstName" => $address->firstName,
            "lastName" => $address->lastName,
            "flagForMassege" => 1
        );
            Mail::to($address->email)->send(new MethodStatementNaturalEmail($content));
            Mail::to($address->email)->send(new OrderExelEmail($content));

        }else if($request->recive_type == 1){
             $content = array(
            "firstName" => $address->firstName,
            "lastName" => $address->lastName,
            "flagForMassege" => 2
        );
            Mail::to($address->email)->send(new MethodStatementMamishEmail($content));
            Mail::to($address->email)->send(new OrderExelEmail($content));
        }

       	$email_already = DB::table("newsletters")->where("email", $address->email)->first();
       
       	
	
		if (!is_null($email_already)) {
            return redirect('/success-save')
            ->with('message-success', __('site.SuccessfullyUpdated'));
		}
		else{
			DB::table("newsletters")->insert(array("email" => $address->email));
			Mail::to($address->email)->send(new NewslettersEmail());
            return redirect('/success-save')
            ->with('message-success', __('site.SuccessfullyUpdated'));
		}
        // test
        	    
        	    
        	}
       	catch (\Throwable $th) {
            return response($th);
        }
        
      
    

    }
    public function successSave()
    {
        return view('pages.successSave');
        }
    public function validationcode($email)
    {
        $data = [];
        $data['email'] = $email;
        return view('frontend.validationcode', $data);
    }
    // public function validationcodeforresetpasward($email)
    // {

    //     $data = [];
    //     $data['email'] = $email;

    //     return view('frontend.validationcodeforgottenpasward', $data);

    // }
    
    public function resetpasswordForm(Request $customer)
    {
        $data = [];
        $data['email'] =$customer["email"];
        $dbCustomer = Customer::where("email", $customer["email"])->first();
        if ($dbCustomer["code"] == $customer["code"]) {
            return view('frontend.resetpassword',  $data);
        }
        return back()->with("message", __('site.Please_check_the_code'));

        
    }
    public function changepassword(Request $request)
    {
        // Perform validation on the input data
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|string|min:8', // Adjust the minimum length as needed
        // ]);
    
        // Retrieve the customer based on the provided email
        $dbCustomer = Customer::where('email', $request->input('email'))->first();
    
        if (!$dbCustomer) {
            // Handle the case when the customer with the provided email doesn't exist
            // You can return an error message or redirect to an appropriate page.
        }
    
        // Hash the new password and update the customer's password in the database
        $dbCustomer->password = Hash::make($request->input('password'));
        $dbCustomer->save();
        return redirect('/ulogin');
        // return view('frontend.login');
    }
    
    public function confirmcode(Request $customer)
    {
        $dbCustomer = Customer::where("email", $customer["email"])->first();
        if ($dbCustomer["code"] == $customer["code"]) {
            $dbCustomer["activation"] = 1;
            $dbCustomer->save();
            auth::guard("customer")->login($dbCustomer,true);
            return redirect('/')->with('message-success', __('site.Successfully_regist'));
        }
        return back()->with("message",__('site.Please_check_the_code'));
    }
    
    public function validationcodeforgottenpasward($email)
    {
        $data = [];
        $data['email'] = $email;
      return view('frontend.validationcodeforgottenpasward', $data);
    }
    public function resetPassword(Request $customer)
    {
        $dbCustomer = Customer::where("email", $customer["email"])->first();
        $email = $customer["email"];
        $code = $dbCustomer["code"];
        $message = $dbCustomer["name"];
        $content = array(
            "code" =>  $code,
            "email" => $email,
            "message" => $message,
            
        );
         Mail::to($email)->send(new ChangePasswordEmail($content));
     
        return back()->with("message", __('site.Please_check_your_e-mail_reset_password'));

        // return redirect('/validationcodeforgottenpasward');
    }
    public function ulogin()
    {
        return view('frontend.login');
    }
    public function forgottenpasward()
    {


        return view('frontend.forgottenpasward');
    }
    public function bill()
    {
        return view('frontend.bill');
    }
    public function email()
    {
        return view('frontend.email');
    }
    public function contactfrontend()
    {
        return view('frontend.contactfrontend');
    }

    public function singleproduct($id , $saleId = null)
    {
        //  return $saleId;
       if ($saleId != null) 
       {
        // $saleId = $id;
        $enable = 1;
        $lang = Session::get("locale");
      
        $languages = json_decode(setting_by_key("languages"), true);
            
        if (empty(Session::get("locale")))
            $lang ='ar';
        $categories = Category::orderBy("sort", "Desc")->where("enable", $enable)->get();
        foreach ($categories as $cat) {
            $cat->translation = DB::table("categories_translation")->where("category_id", $cat->id)
                ->where("lang", 'ar')->first();
            $products = Product::where("category_id", $cat->id)->where("is_delete", 0)->orderBy("sort", "Desc")->where("enable", $enable)->get();
            // foreach ($products as $pro) {
            //     $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)
            //         ->where("lang", $lang)->first();
            // }

            $cat->products = $products;
        }
        $reviews = Review::get();

        $saleInfo = Sale::where('id', $saleId)->first();
        $existingItems = json_decode($saleInfo->preSale, true);
        
        foreach ($existingItems as &$value) {
            $value['quantity'] = intval( $value['quantity']);
            $value['statusEvaluate'] = intval( $value['statusEvaluate']);

            $value['translation'] = DB::table("products_translation")->where("product_id", $value['product_id'])
                ->where("lang",'ar')->first();

        }
        
        $Items = json_encode($existingItems);
        $count = count($existingItems);
      
       }
       else{
        $saleId =0;
        $count =0;
        $Items =0;
       }
            //current lang
            $languages = json_decode(setting_by_key("languages"), true);
            $enable = 1;
            $lang = Session::get("locale");
            ;
            if (empty(Session::get("locale")))
                $lang = $languages[0];
            //get product witgh translation
            $product = Product::where("is_delete", 0)
                ->where("id", $id)
                ->where("enable", 1)->first();
            // $product->translation = DB::table("products_translation")->where("product_id", $id)
            //     ->where("lang", $lang)->first();
                
            // get collection of product for sale
            $relatedproductsId = [];
            if (!empty($product->related_products)) {
                $decoded = json_decode($product->related_products);
                if ($decoded !== null) {
                    foreach ($decoded as $obj) {
                        $relatedproductsId[] = $obj->id;
                    }
                }
            }

            $relatedprices = [];
            if (!empty($product->related_products)) {
                $decoded = json_decode($product->related_products);
                if ($decoded !== null) {
                    foreach ($decoded as $obj) {
                        $relatedprices[$obj->id] = $obj->price;
                    }
                }
            }
            
            $collectionproduct = [];
            $allproducts = Product::select('id','category_id', 'name', 'description','titles', 'prices')->get();  
            foreach ($allproducts as $pro) {
                $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)->orderBy("product_id", "DESC")->where("lang", $lang)->first();
                if ($pro->translation === null) 
                {
                    $pro->translation = DB::table("products_translation")
                        ->where("product_id", $pro->id)
                        ->where("lang", "ar")
                        ->first();
                }  
                  }        
            foreach ($allproducts as $key => $value) {
                if (in_array($value->id, $relatedproductsId)) {
                    $newProduct = [
                        'id' => $value->id,
                        'category_id' => $value->category_id,
                        'name' => $value->translation->name,
                        'description' => $value->translation->description,
                        'titles' => $value->titles,
                        'old_price' => json_decode($value->prices), // add the old_price property
                        'new_price' => $relatedprices[$value->id], // add the new_price property
                    ];
                    array_push($collectionproduct, $newProduct);          
                }
                
            }
            
            // return $collectionproduct;



            // foreach ($collectionproduct as $key => $value) {
            //     $value['translation'] = DB::table("products_translation")->where("product_id", $value['id'])
            //         ->where("lang", $lang)->first();
            // }

            $cat_Id = $product->category_id;
            // $RelatedProducts = "";
            $RelatedProducts = Product::where("is_delete", 0)
                ->where("enable", $enable)->where("category_id", $cat_Id)->orderBy("name", "ASC")->get();
            // foreach ($RelatedProducts as $pro) {
            //     $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)
            //         ->where("lang", $lang)->first();
            // }
            //reviews 
            $reviews = Review::where("productId", $product->id)->get();

          
        
       
       
        return view('frontend.singleproduct', compact('product', 'collectionproduct', 'RelatedProducts', 'reviews' , 'saleId', 'count','Items'));
    }
  
    public function editevaluate(Request $request)
    {
        $Idsale = $request->input('Idsale');
        $Idproduct = $request->input('Idproduct');
        $EvaluateOrginalValue = $request->input('EvaluateOrginalValue');
    
        try {
            $saleInfo = Sale::where('id', $Idsale)->first();
            $preSale = json_decode($saleInfo->preSale, true);
    
            $product = array_filter($preSale, function ($item) use ($Idproduct, $EvaluateOrginalValue) {
                return $item['product_id'] == $Idproduct && $item['evaluate'] == $EvaluateOrginalValue;
            });
            $productValues = array_values($product);
            $productString = json_encode($productValues[0], JSON_UNESCAPED_UNICODE);
            return response($productString) ;
        } catch (\Throwable $th) {
            return response($th);
        }
    }

        public function editevaluateForm(Request $request)
        {

            $form = $request->all();
            $Idsale = $request->input('saleId');
            $Idproduct = $request->input('productIdForEdit');
            $EvaluateOrginalValue = $request->input('productEvaluateForEdit');
               //current lang
               $languages = json_decode(setting_by_key("languages"), true);
               $enable = 1;
               $lang = Session::get("locale");
               ;
               if (empty(Session::get("locale")))
                   $lang = $languages[0];
            $data = [];
            try {
                $saleInfo = Sale::where('id', $Idsale)->first();
                $preSale = json_decode($saleInfo->preSale, true);
        
                $product = array_filter($preSale, function ($item) use ($Idproduct, $EvaluateOrginalValue) {
                    return $item['product_id'] == $Idproduct && $item['evaluate'] == $EvaluateOrginalValue;
                });
                

        if ($EvaluateOrginalValue != "") {
            $evaluate_result = json_decode($EvaluateOrginalValue, true);
            $evaluate_resultNum = json_decode($EvaluateOrginalValue, true);
            $a1 = __("site.hair_type1");
            $a2 = __("site.not_used");
            $a3 = __("site.month_before");
            $a4 = __("site.Yes");


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


            } else if (isset($evaluate_result['answer2']) && $$evaluate_result['answer2'] == 2) {
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
            $evaluate_result['answer4']= $a4;

            // $evaluate_resultNum = json_encode($evaluate_resultNum);
            // $evaluate_result = json_encode($evaluate_result);
         
            $data["evaluate_resultNum"] = $evaluate_result;
            $data["evaluate_result"] = $evaluate_result;
        
        } else {
            $data["evaluate_result"] = "";
        }

        
        $existingItems = json_decode($saleInfo->preSale, true);
        
        foreach ($existingItems as &$value) {
            $value['quantity'] = intval( $value['quantity']);
            $value['statusEvaluate'] = intval( $value['statusEvaluate']);

            $value['translation'] = DB::table("products_translation")->where("product_id", $value['product_id'])
                ->where("lang", $lang)->first();

        }   
        $Items = json_encode($existingItems);
        $count = count($existingItems);

        $evaluate_resultNumOrginal = json_encode($EvaluateOrginalValue, true);
        $productId = $Idproduct;
                return view('frontend.editevaluate', compact('evaluate_result','evaluate_resultNum','Idsale','evaluate_resultNumOrginal','productId','Items','count') );
            } catch (\Throwable $th) {
                return response($th);
            }
         
            // return view('frontend.editevaluate', $product);
        }


  // $oldpreSale = array();
            // $oldpreSale = json_decode($saleInfo->preSale, true);
            // foreach ($oldpreSale as $key => $item) {
            //     if ($item['catId'] == 15) {
            //         unset($oldpreSale[$key]);
            //     }
            //     ;
            // }
            // array_push($oldpreSale, $request->items);
            // if ($saleInfo) {
            //     $saleInfo->evaluate = $request->evaluate;
            //     $saleInfo->preSale = json_encode($oldpreSale);
            //     $saleInfo->save();
            // }
        // $id = $saleId;
        // $data = [];

        // $data["id"] = $id;
        // $shoppingCart = Sale::whereIn("type", ["preOrder"])
        //     ->where("status", -2)
        //     ->where("id", $id)
        //     ->first();
        // $data["shoppingCartItems"] = json_decode($shoppingCart->preSale);
        // $data["shoppingCart"] = $shoppingCart;


        // if ($shoppingCart->evaluate != "") {
        //     $evaluate_result = json_decode($shoppingCart->evaluate);
        //     $evaluate_resultNum = json_decode($shoppingCart->evaluate);
        //     $a1 = __("site.hair_type1");
        //     $a2 = __("site.not_used");
        //     $a3 = __("site.month_before");
        //     $a4 = __("site.Yes");

        //     if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 0) {
        //         $a1 = __("site.hair_type1");


        //     } else if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 1) {
        //         $a1 = __('site.hair_type2');


        //     } else if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 2) {
        //         $a1 = __('site.hair_type3');


        //     } else if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 3) {
        //         $a1 = __('site.hair_type4');


        //     }

        //     if (isset($evaluate_result->answer2) && $evaluate_result->answer2 == 0) {
        //         $a2 = __("site.not_used");


        //     } else if (isset($evaluate_result->answer2) && $evaluate_result->answer2 == 1) {
        //         $a2 = __('site.more6month');


        //     } else if (isset($evaluate_result->answer2) && $evaluate_result->answer2 == 2) {
        //         $a2 = __('site.less6month');
        //     }
        //     if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 0) {
        //         $a3 = __("site.month_before");
        //     } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 1) {
        //         $a3 = __('site.month_6before');
        //     } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 2) {
        //         $a3 = __('site.year_before');
        //     } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 3) {
        //         $a3 = __('site.year_2before');
        //     } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 4) {
        //         $a3 = __('site.year_3before');
        //     } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 5) {
        //         $a3 = __('site.year_3more');
        //     } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 6) {
        //         $a3 = __('site.not_use_color_remove');
        //     }
        //     if (isset($evaluate_result->answer4) && $evaluate_result->answer4 == 0) {
        //         $a4 = __("site.Yes");
        //     } else if (isset($evaluate_result->answer4) && $evaluate_result->answer4 == 1) {
        //         $a4 = __('site.No');
        //     }



        //     $evaluate_result->answer1 = $a1;
        //     $evaluate_result->answer2 = $a2;
        //     $evaluate_result->answer3 = $a3;
        //     $evaluate_result->answer4 = $a4;

        //     $data["evaluate_resultNum"] = $evaluate_resultNum;
        //     $data["evaluate_result"] = $evaluate_result;
        // } else {
        //     $data["evaluate_result"] = "";
        // }

        // return view('frontend.editevaluate', $data);
   

    public function shoppingcart($saleId)
    {
        try {
            $id = $saleId;
            $data = [];
            $languages = json_decode(setting_by_key("languages"), true);
            $enable = 1;
            $lang = Session::get("locale");
            ;
            if (empty(Session::get("locale")))
                $lang = $languages[0];
    
            $shoppingCart = Sale::whereIn("type", ["preOrder"])
                ->where("status", -2)
                ->where("id", $id)
                ->first();
                // return  $shoppingCart;
                $data["shoppingCartItems"] = json_decode($shoppingCart->preSale);
    
                $data["shoppingCart"] = $shoppingCart;
                $sum = 0;      
                foreach ($data["shoppingCartItems"] as $key => $item) {
                    $item->productinfo = Product::where("id", $item->product_id)->first();
                    
                    $translationValue = DB::table("products_translation")
                        ->where("product_id", $item->product_id)
                        ->where("lang", $lang)
                        ->first();
                
                    if ($translationValue === null) {
                        $translationValue = DB::table("products_translation")
                            ->where("product_id", $item->product_id)
                            ->where("lang", "ar")
                            ->first();
                    }
    
               $item->translation= $translationValue;
                //  $item->name = $translationValue[0]->name;
                $allPrices = explode(",", $item->Allprices);

                if ($item->statusEvaluate == 0 || $item->statusEvaluate == 1 || $item->statusEvaluate == 2) {
                    if ($item->quantity != 1) {
                        $sum += intval($item->price);
                    } else {
                        $firstPrice = floatval($allPrices[0]);
                        $sum += $firstPrice * intval($item->quantity);
                    }
                } else {
                    $sum += intval($item->price) * intval($item->quantity);
                }
                // $allPrices = explode(",", $item->Allprices);
                // if($item->statusEvaluate == 0)
                // {
                //     if ($item->quantity != 1) {
                //         $sum += $item->price;
                //     } else {
                //         $firstPrice = $allPrices[0];
                //         $sum += $firstPrice * $item->quantity;
                //     }
                // }
                // if($item->statusEvaluate == 1)
                // {
                //     if ($item->quantity != 1) {
                //         $sum += $item->price;
                //     } else {
                //         $firstPrice = $allPrices[0];
                //         $sum += $firstPrice * $item->quantity;
                //     }
                // }
                // if($item->statusEvaluate == 2)
                // {
                //     if ($item->quantity != 1) {
                //         $sum += $item->price;
                //     } else {
                //         $firstPrice = $allPrices[0];
                //         $sum += $firstPrice * $item->quantity;
                //     }
                // }
                
                // if($item->statusEvaluate != 0 && $item->statusEvaluate != 1 && $item->statusEvaluate != 2){
                // $sum += $item->price * $item->quantity;            
                // }

                // if($item->statusEvaluate == 0)
                // {
                //     if ($item->quantity == 2) 
                //     {
                //         $sum += $item->price ;
                //     } else if($item->quantity == 3) {
                //         $sum += $item->price ;
                //     }
                //     else {
                //         $allPrices = explode(",", $item->Allprices);
                //         $firstPrice = $allPrices[0];
                //         $sum += $firstPrice * $item->quantity;
                //     }
                // } 
               
            }
        
            $data["subtotal"] = $sum;
            // return $data["subtotal"] ;
            if (!empty($data["shoppingCartItems"])) {
                // return $data["shoppingCartItems"];
                // dd($data["shoppingCartItems"]);
                foreach ($data["shoppingCartItems"] as $key => $item) {
                    // if(){
    
    
                    // }
                    $evaluateData = json_decode($item->evaluate);
                    $evaluateDataOrginalValue = json_decode($item->evaluate);
                    if (!empty($evaluateData)) {
                   
                        $a1 = '';
                        $a2 = '';
                        $a3 = '';
                        $a4 = '';
            
                        if (isset($evaluateData->answer1) && $evaluateData->answer1 == 0) {
                            $a1 = __("site.hair_type1");
                        } else if (isset($evaluateData->answer1) && $evaluateData->answer1 == 1) {
                            $a1 = __('site.hair_type2');
                        } else if (isset($evaluateData->answer1) && $evaluateData->answer1 == 2) {
                            $a1 = __('site.hair_type3');
                        } else if (isset($evaluateData->answer1) && $evaluateData->answer1 == 3) {
                            $a1 = __('site.hair_type4');
                        }
            
                        if (isset($evaluateData->answer2) && $evaluateData->answer2 == 0) {
                            $a2 = __("site.not_used");
                        } else if (isset($evaluateData->answer2) && $evaluateData->answer2 == 1) {
                            $a2 = __('site.more6month');
                        } else if (isset($evaluateData->answer2) && $evaluateData->answer2 == 2) {
                            $a2 = __('site.less6month');
                        }
            
                        if (isset($evaluateData->answer3) && $evaluateData->answer3 == 0) {
                            $a3 = __("site.month_before");
                        } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 1) {
                            $a3 = __('site.month_6before');
                        } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 2) {
                            $a3 = __('site.year_before');
                        } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 3) {
                            $a3 = __('site.year_2before');
                        } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 4) {
                            $a3 = __('site.year_3before');
                        } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 5) {
                            $a3 = __('site.year_3more');
                        } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 6) {
                            $a3 = __('site.not_use_color_remove');
                        }
            
                        if (isset($evaluateData->answer4) && $evaluateData->answer4 == 0) {
                            $a4 = __("site.Yes");
                        } else if (isset($evaluateData->answer4) && $evaluateData->answer4 == 1) {
                            $a4 = __('site.No');
                        }
            
                        $evaluateData->answer1 = $a1;
                        $evaluateData->answer2 = $a2;
                        $evaluateData->answer3 = $a3;
                        $evaluateData->answer4 = $a4;
                     
                    }
                    
                    $data["shoppingCartItems"][$key]->evaluate= !empty($evaluateData) ? $evaluateData : "";
                    $data["shoppingCartItems"][$key]->evaluateOrginalValue= !empty($evaluateDataOrginalValue) ? $evaluateDataOrginalValue : "";
    
                    // dd($data["shoppingCartItems"]);
                }
                // return $data["shoppingCartItems"];
    
            }
            if ($shoppingCart->evaluate != "") {
                $evaluate_result = json_decode($shoppingCart->evaluate);
                // $a1 = __("site.hair_type1");
                // $a2 = __("site.not_used");
                // $a3 = __("site.month_before");
                // $a4 = __("site.Yes");
                $a1 = '';
                $a2 = '';  $a3 = '';  $a4 = '';
                if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 0) {
                    $a1 = __("site.hair_type1");
    
    
                } else if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 1) {
                    $a1 = __('site.hair_type2');
    
    
                } else if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 2) {
                    $a1 = __('site.hair_type3');
    
    
                } else if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 3) {
                    $a1 = __('site.hair_type4');
    
    
                }
    
                if (isset($evaluate_result->answer2) && $evaluate_result->answer2 == 0) {
                    $a2 = __("site.not_used");
    
    
                } else if (isset($evaluate_result->answer2) && $evaluate_result->answer2 == 1) {
                    $a2 = __('site.more6month');
    
    
                } else if (isset($evaluate_result->answer2) && $evaluate_result->answer2 == 2) {
                    $a2 = __('site.less6month');
                }
                if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 0) {
                    $a3 = __("site.month_before");
                } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 1) {
                    $a3 = __('site.month_6before');
                } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 2) {
                    $a3 = __('site.year_before');
                } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 3) {
                    $a3 = __('site.year_2before');
                } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 4) {
                    $a3 = __('site.year_3before');
                } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 5) {
                    $a3 = __('site.year_3more');
                } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 6) {
                    $a3 = __('site.not_use_color_remove');
                }
                if (isset($evaluate_result->answer4) && $evaluate_result->answer4 == 0) {
                    $a4 = __("site.Yes");
                } else if (isset($evaluate_result->answer4) && $evaluate_result->answer4 == 1) {
                    $a4 = __('site.No');
                }
    
    
    
                $evaluate_result->answer1 = $a1;
                $evaluate_result->answer2 = $a2;
                $evaluate_result->answer3 = $a3;
                $evaluate_result->answer4 = $a4;
    
                $data["evaluate_result"] = $evaluate_result;
            } else {
                $data["evaluate_result"] = "";
            }
    
            $data["id"] = $id;
    
    
    /////////////////////
            // $saleId = $id;
            $enable = 1;
            $lang = Session::get("locale");
          
            $languages = json_decode(setting_by_key("languages"), true);
    
            if (empty(Session::get("locale")))
                $lang ='de';
            $categories = Category::orderBy("sort", "Desc")->where("enable", $enable)->get();
            foreach ($categories as $cat) {
                $cat->translation = DB::table("categories_translation")->where("category_id", $cat->id)
                    ->where("lang", $lang)->first();
                $products = Product::where("category_id", $cat->id)->where("is_delete", 0)->orderBy("sort", "Desc")->where("enable", $enable)->get();
                // foreach ($products as $pro) {
                //     $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)
                //         ->where("lang", $lang)->first();
                // }
    
                $cat->products = $products;
            }
            $reviews = Review::get();
    
            $saleInfo = Sale::where('id', $saleId)->first();
            $existingItems = json_decode($saleInfo->preSale, true);
            
            foreach ($existingItems as &$value) {
                $value['quantity'] = intval( $value['quantity']);
                $value['statusEvaluate'] = intval( $value['statusEvaluate']);
    
                $translation = DB::table("products_translation")
                ->where("product_id", $value['product_id'])
                ->where("lang", $lang)
                ->first();
            
            if ($translation === null) {
                $translation = DB::table("products_translation")
                    ->where("product_id", $value['product_id'])
                    ->where("lang", "ar")
                    ->first();
            }
            
            $value['translation'] = $translation;
            }
            
            $Items = json_encode($existingItems);
            $count = count($existingItems);
            $data["Items"] = $Items;
            $data["count"] = $count;
            $data["saleId"] = $saleId;
            //  return $data;
            return view('frontend.shoppingcart', $data);
        } catch (\Throwable $th) {
            return redirect('/');
        }
    }
    public function checkout($saleId)
    {
        try {
            $id = $saleId;
        $data = [];
        $enable = 1;
        $lang = Session::get("locale");
      
        $languages = json_decode(setting_by_key("languages"), true);

        if (empty(Session::get("locale")))
            $lang ='ar';
        $shoppingCart = Sale::whereIn("type", ["preOrder"])
            ->where("status", -2)
            ->where("id", $id)
            ->first();
        $data["shoppingCartItems"] = json_decode($shoppingCart->preSale);
        $data["delivery_cost"] = $shoppingCart->delivery_cost;
        $data["discount"] = $shoppingCart->discount;
        $data["shoppingCart"] = $shoppingCart;

        $sum = 0;
        foreach ($data["shoppingCartItems"] as $key => $item) {
            $item->productinfo = Product::where("id", $item->product_id)->first();
            $allPrices = explode(",", $item->Allprices);

            if ($item->statusEvaluate == 0 || $item->statusEvaluate == 1 || $item->statusEvaluate == 2) {
                if ($item->quantity != 1) {
                    $sum += $item->price;
                } else {
                    $firstPrice = $allPrices[0];
                    $sum += $firstPrice * $item->quantity;
                }
            } else {
                $sum += $item->price * $item->quantity;
            }

            // if($item->statusEvaluate == 0)
            // {
            //     if ($item->quantity == 2) 
            //     {
            //         $sum += $item->price ;
            //     } else if($item->quantity == 3) {
            //         $sum += $item->price ;
            //     }
            //     else {
            //         $allPrices = explode(",", $item->Allprices);
            //         $firstPrice = $allPrices[0];
            //         $sum += $firstPrice * $item->quantity;  
            //     }
            // } else
            //     if($item->statusEvaluate != 0){
            //     $sum += $item->price * $item->quantity;            
            // }
        }
        $data["subtotal"] = $sum;

        if (!empty($data["shoppingCartItems"])) {
     
            foreach ($data["shoppingCartItems"] as $key => $item) {
                $evaluateData = json_decode($item->evaluate);
                $evaluateDataOrginalValue = json_decode($item->evaluate);
                if (!empty($evaluateData)) {
               
                    $a1 = '';
                    $a2 = '';
                    $a3 = '';
                    $a4 = '';
        
                    if (isset($evaluateData->answer1) && $evaluateData->answer1 == 0) {
                        $a1 = __("site.hair_type1");
                    } else if (isset($evaluateData->answer1) && $evaluateData->answer1 == 1) {
                        $a1 = __('site.hair_type2');
                    } else if (isset($evaluateData->answer1) && $evaluateData->answer1 == 2) {
                        $a1 = __('site.hair_type3');
                    } else if (isset($evaluateData->answer1) && $evaluateData->answer1 == 3) {
                        $a1 = __('site.hair_type4');
                    }
        
                    if (isset($evaluateData->answer2) && $evaluateData->answer2 == 0) {
                        $a2 = __("site.not_used");
                    } else if (isset($evaluateData->answer2) && $evaluateData->answer2 == 1) {
                        $a2 = __('site.more6month');
                    } else if (isset($evaluateData->answer2) && $evaluateData->answer2 == 2) {
                        $a2 = __('site.less6month');
                    }
        
                    if (isset($evaluateData->answer3) && $evaluateData->answer3 == 0) {
                        $a3 = __("site.month_before");
                    } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 1) {
                        $a3 = __('site.month_6before');
                    } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 2) {
                        $a3 = __('site.year_before');
                    } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 3) {
                        $a3 = __('site.year_2before');
                    } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 4) {
                        $a3 = __('site.year_3before');
                    } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 5) {
                        $a3 = __('site.year_3more');
                    } else if (isset($evaluateData->answer3) && $evaluateData->answer3 == 6) {
                        $a3 = __('site.not_use_color_remove');
                    }
        
                    if (isset($evaluateData->answer4) && $evaluateData->answer4 == 0) {
                        $a4 = __("site.Yes");
                    } else if (isset($evaluateData->answer4) && $evaluateData->answer4 == 1) {
                        $a4 = __('site.No');
                    }
        
                    $evaluateData->answer1 = $a1;
                    $evaluateData->answer2 = $a2;
                    $evaluateData->answer3 = $a3;
                    $evaluateData->answer4 = $a4;
                 
                }
                
                $data["shoppingCartItems"][$key]->evaluate= !empty($evaluateData) ? $evaluateData : "";
                $data["shoppingCartItems"][$key]->evaluateOrginalValue= !empty($evaluateDataOrginalValue) ? $evaluateDataOrginalValue : "";
            }
        }
        if ($shoppingCart->evaluate != "") {
            $evaluate_result = json_decode($shoppingCart->evaluate);
        
            $a1 = '';
            $a2 = '';  $a3 = '';  $a4 = '';
            if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 0) {
                $a1 = __("site.hair_type1");

            } else if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 1) {
                $a1 = __('site.hair_type2');

            } else if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 2) {
                $a1 = __('site.hair_type3');
            } else if (isset($evaluate_result->answer1) && $evaluate_result->answer1 == 3) {
                $a1 = __('site.hair_type4');
            }

            if (isset($evaluate_result->answer2) && $evaluate_result->answer2 == 0) {
                $a2 = __("site.not_used");
            } else if (isset($evaluate_result->answer2) && $evaluate_result->answer2 == 1) {
                $a2 = __('site.more6month');
            } else if (isset($evaluate_result->answer2) && $evaluate_result->answer2 == 2) {
                $a2 = __('site.less6month');
            }
            if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 0) {
                $a3 = __("site.month_before");
            } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 1) {
                $a3 = __('site.month_6before');
            } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 2) {
                $a3 = __('site.year_before');
            } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 3) {
                $a3 = __('site.year_2before');
            } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 4) {
                $a3 = __('site.year_3before');
            } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 5) {
                $a3 = __('site.year_3more');
            } else if (isset($evaluate_result->answer3) && $evaluate_result->answer3 == 6) {
                $a3 = __('site.not_use_color_remove');
            }
            if (isset($evaluate_result->answer4) && $evaluate_result->answer4 == 0) {
                $a4 = __("site.Yes");
            } else if (isset($evaluate_result->answer4) && $evaluate_result->answer4 == 1) {
                $a4 = __('site.No');
            }



            $evaluate_result->answer1 = $a1;
            $evaluate_result->answer2 = $a2;
            $evaluate_result->answer3 = $a3;
            $evaluate_result->answer4 = $a4;

            $data["evaluate_result"] = $evaluate_result;
        } else {
            $data["evaluate_result"] = "";
        }
        $data["id"] = $id;

        $saleInfo = Sale::where('id', $saleId)->first();
        $existingItems = json_decode($saleInfo->preSale, true);
        
        foreach ($existingItems as &$value) {
            $value['quantity'] = intval( $value['quantity']);
            $value['statusEvaluate'] = intval( $value['statusEvaluate']);

            $value['translation'] = DB::table("products_translation")->where("product_id", $value['product_id'])
                ->where("lang", 'ar')->first();

        }
        
        $Items = json_encode($existingItems);
        $count = count($existingItems);
        
        $data["Items"] = $Items;
        $data["count"] = $count;
        //  return $data;   

        return view('frontend.checkout', $data );

        } catch (\Throwable $th) {
            return redirect('/');
        }
       
    }
    public function faqs()
    {
        $languages = json_decode(setting_by_key("languages"), true);

        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $page = Page::where("language", $lang)->where("slug", "faq")->first();
        return view('pages.dynamic', ['page' => $page]);
    }
    public function pages($slug)
    {

        $lang = Session::get("locale");
          
        $languages = json_decode(setting_by_key("languages"), true);

        if (empty(Session::get("locale")))
            $lang ='de';
        $page = Page::where("language", $lang)->where("slug", $slug)->first();

        // if($slug == "AGB")
        // {
        //     $page = Page::where("language", $lang)->where("slug", "AGB")->first();
        // }
        // if($slug == "Datenschutz")
        // {
        //     $page = Page::where("language", $lang)->where("slug", "Datenschutz")->first();
        // }
        // if($slug == "Widerrufsrecht")
        // {
        //     $page = Page::where("language", $lang)->where("slug", "Widerrufsrecht")->first();
        // }
        return view('pages.dynamic', ['page' => $page]);
    }
    public function getWishlistofuser(Request $request)
    {
        try {
            $languages = json_decode(setting_by_key("languages"), true);

            $lang = Session::get("locale");
            if (empty(Session::get("locale")))
                $lang = $languages[0];
            $customerId = $request->customer_id;
            $wishlistarray = DB::table("wishlist")->where('customer_id', $customerId)->get();
            foreach ($wishlistarray as $key => $value) {
                $value->product = Product::where('id', $value->product_id)->first();
                $value->translation = Db::table("products_translation")
                    ->where('product_id', $value->product_id)
                    ->where('lang', $lang)
                    ->first();
            }

            //return $wishlistarray;
            return view('frontend.wishlist', compact('wishlistarray'));

        } catch (\Throwable $th) {
            return $th;
        }

    }
    public function termsCondition()
    {
        $languages = json_decode(setting_by_key("languages"), true);

        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $page = Page::where("language", $lang)->where("slug", "services")->first();
        return view('pages.dynamic', ['page' => $page]);
    }
    public function contact()
    {
        $setting_map = Setting::where('key', 'map')->get();
        //dd($setting_map[0]->value);
        return view('pages.contact', compact('setting_map'));
    }


    public function sendemailtest()
    {
        try {
            // $name = $request->input('name');
            // $email = $request->input('email');
            // $message = $request->input('message');
            $content = array(
                "name" => "test",
                "email" => "test",
                "message" => "test"
            );
            Mail::to("faisalnaser587@gmail.com")->send(new Contact($content));
            // Mail::to($email)->send(new Contact($content));
            echo "success";
        } catch (\Throwable $th) {
            return $th;
        }

    }
    public function contactmessage()
    {
        $contact_messages = DB::table("contact_message")->paginate(10);
    
        // Loop through each contact message and update the gender and message type
        foreach ($contact_messages as $contact_message) {
            if ($contact_message->gender == 0) {
                $contact_message->gender = __("site.male");
            } else {
                $contact_message->gender = __("site.female");
            }
    
            if ($contact_message->messagetype == 0) {
                $contact_message->messagetype = __("site.question_about_a_product");
            } else if ($contact_message->messagetype == 1) {
                $contact_message->messagetype = __("site.complaint");
            } else if ($contact_message->messagetype == 2) {
                $contact_message->messagetype = __("site.i_received_the_wrong_product");
            }
        }
    
        return view('backend.contact.contactmessage', ['contact_messages' => $contact_messages]);
    }
    

    public function contactSave(Request $request)
    {
      
        try {
            
            $firstname = $request->input('first_name');
            $lastname = $request->input('last_name');
            $gender = $request->input('gender');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $messagetype = $request->input('option');
            $message = $request->input('message');
            
            $name = $firstname . " " . $lastname;
            try {
                $dataContact = new ContactMessage();
                $dataContact->firstname =  $request->input('first_name');
                $dataContact->lastname =$request->input('last_name');
                $dataContact->gender =  $request->input('gender');
                $dataContact->email =$request->input('email');
                $dataContact->phone = $request->input('phone');
                $dataContact->messagetype = $request->input('option');
                $dataContact->message = $request->input('message');
                $dataContact->save(); 
                // return $data;
            } catch (\Throwable $th) {
                return back()->with("message",  __('site.Sorry_something_went_wrong'));

            }
       
               if ($messagetype == 0) {
                            $messagetype = __("site.question_about_a_product");
                        } else if ($messagetype == 1) {
                            $messagetype = __("site.complaint");
                        } else if ($messagetype == 2) {
                            $messagetype = __("site.i_received_the_wrong_product");
                        }


            $content = array(
                "name" =>  $name,
                "email" => $email,
                "phone" => $phone,
                "option" => $messagetype,
                "message" => $message,
            );
            Mail::to("info@narjes-alsham.com")->send(new Contact($content));
            return back()->with("message", __('site.Thank_you_for_contacting_us'));
            // echo "success";
        } catch (\Throwable $th) {
            return back()->with("message",   __('site.Sorry_something_went_wrong'));

        }

    }

  
    public function testMail()
    {
        $content = array(
            "name" => "Arfan"
        );

        //return view("emails.booking");
        Mail::to("arfan67@gmail.com")->send(new Test($content));

        echo 'Mail Sent!';
    }

    public function import()
    {
        $sales = Sale::get();
        foreach ($sales as $sale) {
            $items = DB::table("sale_items")->where("sale_id", $sale->id)->get();
            $amount = 0;
            foreach ($items as $item) {
                $amount = $item->quantity * $item->price;
            }
            Sale::where("id", $sale->id)->update(array("amount" => $amount));
        }
        echo "Done";
        //DB::unprepared(file_get_contents('db/pos.sql'));
    }

    public function clearCache()
    {
        try {
            //   Clear configuration cache
        Artisan::call("config:cache");

        // Clear view cache
        Artisan::call("view:clear");

        // Clear route cache
        Artisan::call("route:clear");

        // Clear application cache
        Artisan::call("cache:clear");

          
        } catch (\Exception $e) {
        }
        echo "Done";
        //DB::unprepared(file_get_contents('db/pos.sql'));
    }
    private $code;
    public function customerEmailConfirmation(Request $customer)
    {
        // dd($customer->all());
        $this->code = rand(99999, 10000);

        $address = [];
        $address['street_number'] = $customer["street_number"];
        $address['zipcode'] = $customer["zipcode"];
        $address['city'] = $customer["city"];
        $address['country'] = $customer["country"];
        $customer["address"] = json_encode($address, JSON_UNESCAPED_UNICODE);
        $customer["password"] = Hash::make($customer["password"]);
        $customer["code"] = $this->code;

        $customer["name"] = $customer["firstname"] . $customer["lastname"];

        $dbCustomer = Customer::where("email", $customer["email"])->first();

        $content = array(
            "code" => $this->code,
            "message" => $customer["firstname"],
            "email" => $customer["email"]
        );

        if ($dbCustomer) {
            return back()->with("message", __('site.Email_is_available_please_login'));
        }
     

        Customer::create($customer->all());


        Mail::to($customer["email"])->send(new TestEmail($content));

        //يرسل ايميل بالكود رابط __('site.Successfully_registered') صفحة 
        return back()->with("message", __('site.Please_check_your_e-mail'));

    }

    public function customerEmailOrder(Request $customer)
    {
        $enable = 1;
        $languages = json_decode(setting_by_key("languages"), true);

        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $data['firstName'] = $customer["address"]["firstName"]; 
        $data['lastName'] = $customer["address"]["lastName"];
        $data['street'] = $customer["address"]["street"]; 
        $data['phone'] = $customer["address"]["phone"]; 
        $data['country'] = $customer["address"]["country"]; 
        $data['city'] = $customer["address"]["city"];
        $data['zipCode'] = $customer["address"]["zipCode"];
         $data['phone'] = $customer["address"]["phone"];
        $data['email'] = $customer["address"]["email"]; 
        
        $data['firstName_addressdif'] = $customer["addressBill"]["firstName"]; 
        $data['lastName_addressdif'] = $customer["addressBill"]["lastName"];
        $data['street_addressdif'] = $customer["addressBill"]["street"]; 
        $data['phone_addressdif'] = $customer["addressBill"]["phone"]; 
        $data['country_addressdif'] = $customer["addressBill"]["country"]; 
        $data['zipCode_addressdif'] = $customer["addressBill"]["zipCode"];
        $data['city_addressdif'] = $customer["addressBill"]["city"];
        $data['email_addressdif'] = $customer["addressBill"]["email"]; 
        
        $data['total_cost'] = $customer["total_cost"]; 
        $data['delivery_cost'] = $customer["delivery_cost"]; 
        $data['discount'] = $customer["discount"]; 
        $data['net_cost'] = $customer["net_cost"]; 
        $data['vat'] = $customer["vat"]; 
        $data['subtotal'] = $customer["subtotal"]; 
        $data['saleId'] = $customer["saleId"]; 
        $data['paymentType'] = $customer["paymentType"]; 
        $data['items'] = $customer["items"];
        
        $items = json_decode($data['items'], true);
        foreach ($items as &$item) {
            $productId = $item['product_id'];
                $product = DB::table("products")->where("id", $productId)->first();
                $translation = DB::table("products_translation")->where("product_id", $productId)->orderBy("product_id", "DESC")->where("lang", $lang)->first();
                if ($translation === null) 
                {
                    $translation = DB::table("products_translation")
                        ->where("product_id", $productId)
                        ->where("lang", "ar")
                        ->first();
                } 
        
            if ($translation) {
                $item['product_name'] = $translation->name;
            } else {
                $item['product_name'] = "Unknown"; // Set a default name if translation is not found
            }
        }
        $data['items'] = $items;

        $content = array(
            "firstName" => $data['firstName'],
            "lastName" => $data['lastName'],
            "street" => $data['street'],
            "zipCode" => $data['zipCode'],
            "phone" => $data['phone'],
            "country" => $data['country'],
            "city" => $data['city'],
            "email" => $data['email'],
             "firstNameaddressdif" => $data['firstName_addressdif'],
            "lastNameaddressdif" => $data['lastName_addressdif'],
            "streetaddressdif" => $data['street_addressdif'],
            "phoneaddressdif" => $data['phone_addressdif'],
            "countryaddressdif" => $data['country_addressdif'],
            "cityaddressdif" => $data['city_addressdif'],
            "emailaddressdif" => $data['email_addressdif'],
            "zipCode_addressdif" => $data['zipCode_addressdif'],
            "total_cost" => $data['total_cost'],
            "delivery_cost" => $data['delivery_cost'],
            "discount" => $data['discount'],
            "net_cost" => $data['net_cost'],
            "vat" => $data['vat'],
            "subtotal" => $data['subtotal'],
            "saleId" => $customer["saleId"],
            "paymentType" => $data["paymentType"],
            "items" =>   $data['items'],
        );

        try {
            $hairTypeforN = 0 ;
            $hairTypeforM = 0 ;
            foreach ($items as &$item) {
                if ($item['statusEvaluate'] == 0 || $item['statusEvaluate'] == 1 || $item['statusEvaluate'] == 2) {
                    $productId = $item['product_id'];
                    $product = DB::table("products")->where("id", $productId)->first();
        
                    if ($product) {
                        // Send different emails based on hairType 
       if ($product->hairType == 0) {
                           $hairTypeforN = 1 ;
                            try {

                            } catch (\Throwable $th) {
            return $th;
        }              
                        }
        
                    else if ($product->hairType == 1) {
                       
                            $hairTypeforM = 1 ;
                        }
                    }
                }
            }
            
            
            if($hairTypeforM == 1 && $hairTypeforN == 1)
            {
                 $emailContent = $content; // Store the content in a variable
                 Mail::to($data['email'])->send(new MethodStatementMamishNaturalEmail($emailContent));
            } else if($hairTypeforN == 1 ) {
                    $emailContent = $content;
                    Mail::to($data['email'])->send(new MethodStatementNaturalEmail($emailContent));

            }else if($hairTypeforM == 1 ) {
                    $emailContent = $content;
                    Mail::to($data['email'])->send(new MethodStatementMamishEmail($emailContent));

            }

            // Send the order email after processing items
            Mail::to($data['email'])->send(new OrderEmail($content));
            
        	$email_already = DB::table("newsletters")->where("email", $data['email'])->first();
                	try{
                	    	if (is_null($email_already)) {
                				DB::table("newsletters")->insert(array("email" => $data['email']));
                		    	Mail::to($data['email'])->send(new NewslettersEmail());
                		}
                	    
                	}
                	catch (\Throwable $th) {
                            return $th;
                        }
	
            return $data;
        } catch (\Throwable $th) {
            return $th;
        }

    }
}
