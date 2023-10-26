<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Product;
use App\Expense;
use App\Activity;
use App\SaleItem;
use DB;
use PDF;
use App\User;
use Session;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index(Request $request , $type)
    {
        $form = $request->all();
		$data['input'] = $form;
		$date_range = $request->input('date_range');
		$start = $request->input('start');
		$end = $request->input('end');

			$query = DB::table("sales");
			$title = "All";
			if($date_range == "today") {
				$title = "Today";
				$query->whereDay('sales.created_at', '=', date('d'))->whereMonth('sales.created_at', '=', date('m'));
			}
			if($date_range == "current_week") {
				$title = date("Y-m-d") . " - " . date('Y-m-d h:i:s' , strtotime("-7 days"));
				$query->where('sales.created_at', '>=', date('Y-m-d h:i:s' , strtotime("-7 days")));
			}
			if($date_range == "current_month") {
				$title = date('F');
				$query->whereMonth('sales.created_at', '=', date('m'));
			}

			if($date_range == "custom_date") {
				$query->where('sales.created_at', '>=', date('Y-m-d' , strtotime($start)));
				$query->where('sales.created_at', '<=', date('Y-m-d' , strtotime($end)));
				$title = date('Y-m-d' , strtotime($start)) . " - " .date('Y-m-d' , strtotime($end));
			}

			$data['sales'] = $query->select("*" , "sales.id as id")->leftJoin("sale_items as s" , "s.sale_id" , '=', "sales.id" )->orderBy('sales.created_at', 'DESC')->groupBy("s.sale_id")->get();

			$pdf = "";
			if(!empty($_GET['pdf'])) {
				$pdf = $_GET['pdf'];
			}

			if($pdf == "yes") {
				$data['title'] = "Sales Report ($title)";
				$pdf = PDF::loadView('backend.reports.sales.sales_pdf' , $data);
				return $pdf->download('staff_sold.pdf');
			}

        return view('backend.reports.'.$type.'.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($type, $id)
    {
                         $languages  = json_decode(setting_by_key("languages") , true);

        $lang = Session::get("locale");
        if(empty(Session::get("locale"))) $lang = $languages[0];
        $data = [];
        $sale = Sale::find($id);
        $sale->client = DB::table("customers")->where("id" , $sale->customer_id)->first();
                $productCateqory = array();

		$products = $sale->items;
	     foreach( $products as $pro) {
			$pro->translation  = DB::table("products_translation")->where("product_id" , $pro->product_id)
			->where("lang" ,$lang)->first();
			 $productCategory = DB::table("products")->where("id" , $pro->product_id)->first();
	            array_push($productCateqory,$productCategory->category_id );
		}
				$productprint =[];
		$printers = DB::table("printers")->get();
		foreach( $printers as $print) {

		    if(in_array($productCategory->category_id , $print->category_id ? json_decode($print->category_id) : []))
			   {
			       if(in_array($print , $productprint))
			       {

			       }else
			       {
			         array_push($productprint,$print );

			       }

		   }
		}

		$data['productCateqory'] = $productCateqory;
		$data['printers'] = $productprint;

		$data['sale'] = $sale;
		$data['products'] = $products;
		//dd($data['products'] );
		// return $data['products'];
		return view('backend.reports.'.$type.'.show', $data);
    }



	public function staffSold(Request $request)
    {
        $from = $request->from ? Carbon::parse($request->from)->startOfDay() :  Carbon::now()->subDays(7)->startOfDay();
		$to   = $request->to ? Carbon::parse($request->to)->endOfDay() : Carbon::now()->endOfDay();
		$sales = Sale::where('status', '!=', 0)->whereBetween('created_at', [$from, $to])->get();
		$cashiers = $sales->groupBy('cashier.name');
		$payment_group = $sales->groupBy('payment_with');
		$free_sales = $sales->where('amount', 0)->sum('discount');
        return view('backend.reports.staff_sold', compact('sales', 'cashiers', 'payment_group', 'free_sales','to','from'));
    }



	public function SalesByProduct(Request $request) {
	     $data['time'] = now('Europe/Istanbul');
	    $form = $request->all();
	    $data['input'] = $form;
		$date_range = $request->input('date_range');
		$start = $request->input('start');
		$end = $request->input('end');

			$query = DB::table("sale_items");
			if($date_range == "today") {
				$query->whereDay('sale_items.created_at', '=', date('d'))->whereMonth('sale_items.created_at', '=', date('m'));
			}
			if($date_range == "current_week") {
				$query->where('sale_items.created_at', '>=', date('Y-m-d h:i:s' , strtotime("-7 days")));
			}
			if($date_range == "current_month") {
				$query->whereMonth('sale_items.created_at', '=', date('m'));
			}

			if($date_range == "custom_date") {
				$query->where('sale_items.created_at', '>=', date('Y-m-d' , strtotime($start)));
				$query->where('sale_items.created_at', '<=', date('Y-m-d' , strtotime($end)));

			}

			$sales_by_product = $query->select("*", DB::raw('SUM(quantity) as total_sales'))->groupBy("product_id")->orderBy("total_sales",'DESC')->get();
// 			foreach($sales as $sale) {
// 				$sale->user = User::find($sale->cashier_id);
// 			}

// 		$sales_by_product = DB::select("SELECT  SUM(quantity) as total_sales,product_id FROM sale_items GROUP BY (product_id) ORDER BY total_sales DESC");
        if(!empty($sales_by_product)) {
			foreach($sales_by_product as $sale) {
				 $sale->product_id;
				 $s = Product::find($sale->product_id);
				 $sale->product_name = "";
				 if(!empty($s))
				 $sale->product_name = $s->name;

			}
		}
        $data["sales_by_product"] = $sales_by_product;
		$pdf = "";
		if(!empty($_GET['pdf'])) {
				$pdf = $_GET['pdf'];
			}
			if($pdf == "yes") {
				$data['title'] = "Sales By Product";
				$pdf = PDF::loadView('backend.reports.sales_by_product_pdf' , $data);
				return $pdf->download('staff_sold.pdf');
			}


        return view('backend.reports.sales_by_products', $data);
	}

	public function Graphs() {
		$data['transections_7_days'] = $this->getRevenueRransections(7);
		$data['transections_30_days'] = $this->getRevenueRransections(30);
        $data['get_orders_365'] = $this->getRevenueTransectionsYearly(365);

		$data['transections_7_days_online'] = $this->getRevenueRransections(7 , 'order');
		$data['transections_30_days_online'] = $this->getRevenueRransections(30, 'order');
        $data['get_orders_365_online'] = $this->getRevenueTransectionsYearly(365, 'order');

		 return view('backend.reports.graphs', $data);
	}

	public function expenses(Request $request) {
	    $form = $request->all();
	    $data['input'] = $form;
		$date_range = $request->input('date_range');
		$start = $request->input('start');
		$end = $request->input('end');

			$query = DB::table("expenses");
			$title = "All";
			if($date_range == "today") {
				$title = "Today";
				$query->whereDay('expenses.created_at', '=', date('d'))->whereMonth('expenses.created_at', '=', date('m'));
			}
			if($date_range == "current_week") {
				$title = date("Y-m-d") . " - " . date('Y-m-d h:i:s' , strtotime("-7 days"));
				$query->where('expenses.created_at', '>=', date('Y-m-d h:i:s' , strtotime("-7 days")));
			}
			if($date_range == "current_month") {
				$title = date('F');
				$query->whereMonth('expenses.created_at', '=', date('m'));
			}

			if($date_range == "custom_date") {
				$query->where('expenses.created_at', '>=', date('Y-m-d' , strtotime($start)));
				$query->where('expenses.created_at', '<=', date('Y-m-d' , strtotime($end)));
				$title = date('Y-m-d' , strtotime($start)) . " - " .date('Y-m-d' , strtotime($end));
			}

			$data['expenses'] = $query->select("*" )->orderBy('expenses.created_at', 'DESC')->get();

// 		if(!empty($_GET['start']) and !empty($_GET['end'])) {
// 			$start = $_GET['start'] . " 00:00:00";
// 			$end = $_GET['end'] . " 23:59:00";
// 			$data['expenses'] = Expense::where("created_at" , ">=" , $start)->where("created_at" , "<=" , $end)->paginate(20);
// 		} else {
// 			$data['expenses'] = Expense::paginate(20);
// 		}

		return view('backend.reports.expenses', $data);
	}


	public function expenseSales(Request $request) {

        // ->where( 'created_at', '>', Carbon::now()->subDays(30))
        // ->get();
        // dd($request->all());
	    $from = $request->from ? Carbon::parse($request->from)->startOfDay() :  Carbon::now()->subDays(7)->startOfDay();
		$to   = $request->to ? Carbon::parse($request->to)->endOfDay() : Carbon::now()->endOfDay();
        // dd($from, $to);
		$sales = Sale::where('status', 1)->whereBetween('created_at', [$from, $to])->get();
		// $sales = Sale::where('status', 1)->whereDate('created_at', '>',)->get();
		$expences = Expense::whereBetween('created_at', [$from, $to])->get();
        // dd($sales, $expences, $from, $to);

		return view('backend.reports.expensessales', compact('sales', 'expences','from', 'to'));
	}




	public function staffLogs($id = "") {
		if($id == "") {
			$user = User::where("role_id" , "!=" , 1)->first();
		} else {
			$user = User::find($id);
		}

		$data['user'] = $user;

		if(!empty($user)) {
			$data["users"] = User::where("role_id" , "!=" , 1)->get();
			$data["activities"] = Activity::where("user_id" ,  $user->id)->orderBy("id" , "DESC")->get();
			return view('backend.reports.stafflogs', $data);
		}
	}












	 public function getRevenueRransections($date_difference="" , $type="pos") {
        $where = "";
		$today='';
        if($today != ""){
            $where = "DATE(created_at) = '".date("Y-m-d")."'";
        } else {
            $where = "created_at BETWEEN NOW() - INTERVAL ".$date_difference." DAY AND NOW()";
        }
        $query = DB::select("SELECT SUM(amount) as amount, DATE_FORMAT(created_at,'%W') as day, DATE_FORMAT(created_at,'%d') as dat, DATE_FORMAT(created_at,'%M') as mon, created_at as dated FROM `sales` WHERE type='$type' AND  ".$where." GROUP BY DATE(created_at) ORDER BY created_at DESC");
        return $query;
    }

	public function getRevenueTransectionsYearly($date_difference="" , $type="pos") {
        $where = "";
        if($date_difference != ""){
            $where = "created_at BETWEEN NOW() - INTERVAL ".$date_difference." DAY AND NOW()";
        }

		$query = DB::select("SELECT SUM(amount) as amount, DATE_FORMAT(created_at,'%W') as day, DATE_FORMAT(created_at,'%d') as dat, DATE_FORMAT(created_at,'%M') as mon, created_at as dated FROM `sales` WHERE  type='$type' AND ".$where." GROUP BY MONTH(created_at) ORDER BY created_at DESC");
        return $query;


    }


	public function daily(Request $request)
	{
		$from = $request->from ? Carbon::parse($request->from)->startOfDay() :  Carbon::now()->startOfDay();
		$to   = $request->to ? Carbon::parse($request->to)->endOfDay() : Carbon::now()->endOfDay();

		$sales = SaleItem::whereBetween('created_at', [$from, $to])
		->get()
		->reject(function ($q) {
		    if($q->sale) {
    			if(isset($q->product) && $q->sale->status == 0) {
    				return true;
    			}
		    }else {
		        return true;
		    }
		})
		->groupBy('sale.id');
		return view('backend.reports.daily', compact('sales', 'from', 'to'));
	}


}
