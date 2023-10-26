<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sale;
use App\Product;
use Carbon\Carbon;
use DB;
use Session;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function support()
     {
         return view('backend.support.index');
     }
    public function index()
    {
        if(Auth::user()->role_id == 2) { 
            return redirect("sales/create");
        }

        $languages  = json_decode(setting_by_key("languages") , true);

        $lang = Session::get("locale");
        if(empty(Session::get("locale"))) $lang = $languages[0];
        $now = date('Y-m-d');
        $yersterday = date('Y-m-d', strtotime('- 1 day'));
        $today_date = date('Y-m-d');
        $last_month = date('Y-m-d', strtotime('- 1 month'));
        $last_2month = date('Y-m-d', strtotime('- 2 month'));
        $this_month_start = date('Y-m-d', strtotime('first day of this month'));
        $previous_month_start = date('Y-m-d', strtotime('first day of previous month'));
        $last_week = date('Y-m-d', strtotime('- 1 week'));
        $last_month = date('Y-m-d', strtotime('- 1 month'));
        $total_date = date('Y-m-d', strtotime('- 100 month'));



        $data['today'] = $this->getSalesPrice($today_date, $now);
        $data['yesterday'] = $this->getSalesPrice($yersterday, $yersterday);
        $data['last_week'] = $this->getSalesPrice($last_week, $yersterday);
        $data['last_month'] = $this->getSalesPrice($last_month, $yersterday);
        $data['total_earning'] = $this->getSalesPrice($total_date, $now);

        $data['total_sales'] = count(Sale::get());

        $data['total_sales_today'] = $this->getSalesTotal($today_date, $now);
        $data['total_sales_yesterday'] = $this->getSalesTotal($yersterday, $yersterday);
        $data['total_sales_last_week'] = $this->getSalesTotal($last_week, $yersterday);
        $data['total_sales_last_month'] = $this->getSalesTotal($last_month, $now);
		
        $data['transections_7_days'] = $this->getRevenueRransections(7);
		$data['transections_30_days'] = $this->getRevenueRransections(30);
        $data['get_orders_365'] = $this->getRevenueTransectionsYearly(365);
		
		$data['transections_7_days_online'] = $this->getRevenueRransections(7 , 'order');
		$data['transections_30_days_online'] = $this->getRevenueRransections(30, 'order');
        $data['get_orders_365_online'] = $this->getRevenueTransectionsYearly(365, 'order');
		
		//echo "<pre>"; print_r($data['get_revenue_transections_365']); exit;
       
       
        //7
        $sales_by_product7 = DB::select("SELECT  SUM(quantity) as total_sales,product_id FROM sale_items WHERE created_at BETWEEN NOW() - INTERVAL 7 DAY AND NOW() GROUP BY (product_id) ORDER BY total_sales DESC LIMIT 10");
        if(!empty($sales_by_product7)) {
            foreach ($sales_by_product7 as $sale) {

                $product = DB::table("products_translation")->where("product_id", $sale->product_id)->where("lang", $lang)->first();
                $sale->product_name = "";
                if (!empty($product))
                    $sale->product_name = $product->name;

            }
		}
        $data["sales_by_product7"] = $sales_by_product7;
        //30
          $sales_by_product30 = DB::select("SELECT  SUM(quantity) as total_sales,product_id FROM sale_items WHERE created_at BETWEEN NOW() - INTERVAL 30 DAY AND NOW() GROUP BY (product_id) ORDER BY total_sales DESC LIMIT 10");
        if(!empty($sales_by_product30)) {
            foreach ($sales_by_product30 as $sale) {

                $product = DB::table("products_translation")->where("product_id", $sale->product_id)->where("lang", $lang)->first();
                $sale->product_name = "";
                if (!empty($product))
                    $sale->product_name = $product->name;

            }
		}
        $data["sales_by_product30"] = $sales_by_product30;
        //365
          $sales_by_product365 = DB::select("SELECT  SUM(quantity) as total_sales,product_id FROM sale_items WHERE created_at BETWEEN NOW() - INTERVAL 365 DAY AND NOW() GROUP BY (product_id) ORDER BY total_sales DESC LIMIT 10");
        if(!empty($sales_by_product365)) {
            foreach ($sales_by_product365 as $sale) {

                $product = DB::table("products_translation")->where("product_id", $sale->product_id)->where("lang", $lang)->first();
                $sale->product_name = "";
                if (!empty($product))
                    $sale->product_name = $product->name;

            }
		}
        $data["sales_by_product365"] = $sales_by_product365;
      
        $data['sales'] = Sale::where('status', 1)->orderBy("sales.id", "DESC")->limit(10)->get();
	
        return view('backend.dashboard.home', $data);
    }
    
    function sortBy($a, $b)
    {
        return strcmp($a->total_sales, $b->total_sales);
    }
    
    public function getSalesPrice($start , $end) 
    { 
        $start = Carbon::parse($start)->startOfDay();
        $end = Carbon::parse($end)->endOfDay();
        $amount = Sale::where('status', 1)->whereBetween('created_at', [$start, $end])->sum('amount');
        return $amount;
    } 
    
    public function getSalesTotal($start , $end) 
    { 
        $start = Carbon::parse($start)->startOfDay();
        $end = Carbon::parse($end)->endOfDay();
        $query = Sale::where('status', 1)->whereBetween('created_at', [$start, $end])->count();
        return $query;
    } 
    

    public function getRevenueRransections($date_difference="" , $type="pos") {
        $where = "";
		$today='';
        if($today != ""){
            $where = "DATE(created_at) = '".date("Y-m-d")."'";
        } else {
            $where = "created_at BETWEEN NOW() - INTERVAL ".$date_difference." DAY AND NOW()";
        }
        // $query = DB::select("SELECT SUM(amount) as amount, DATE_FORMAT(created_at,'%W') as day, DATE_FORMAT(created_at,'%d') as dat, DATE_FORMAT(created_at,'%M') as mon, created_at as dated FROM `sales` WHERE status='1' AND  ".$where." GROUP BY DATE(created_at) ORDER BY created_at DESC");
        $query = Sale::query()
        ->where('status', 1)
        ->whereBetween('created_at',[Carbon::now()->subDays($date_difference)->startOfDay(), now()->endOfDay()])
        ->selectRaw('SUM(amount) as amount')
        ->selectRaw('date(created_at) as date')
        ->selectRaw("DATE_FORMAT(created_at,'%W') as day")
        ->selectRaw("DATE_FORMAT(created_at,'%M') as mon")
        ->selectRaw("DATE_FORMAT(created_at,'%d') as dat")
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->limit($date_difference)
        ->toBase()
        ->get()
        ->toArray();
        // ->pluck(['amoun', 'date']);
        // dd($query);

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

    public function notifications(){
        $wordlist = Sale::where('status', '=', 2)->get();
        $sales = $wordlist->count();
        
        return $sales;
    }

}
