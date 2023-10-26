<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\storeCustomer;
use App\Sale;
use App\SaleItem;
use Auth;
use Session;
use Illuminate\Support\Facades\Input;
use SebastianBergmann\Environment\Console;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'customers' => Customer::paginate(),
        ];
        return view('backend.customers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreCustomer $request)
    {
        if(empty($request["address"][0])){
            $request["address"] = null;
        }
        $request["address"] = json_encode($request["address"], JSON_UNESCAPED_UNICODE);
        $form = $request->all();

        $customer = Customer::create($form);
        return redirect('customers')
            ->with('message-success', __('site.SuccessfullyUpdated'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('backend.customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $customer["address"] = json_decode($customer["address"]);

        return view('backend.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests $request
     * @param int               $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateCustomer $request, $id)
    {
        $request["address"] = array_filter( $request["address"] ,function ($value) { return !is_null($value); });
        if(count($request["address"]) < 1){
            $request["address"] = null;
        }
        $form = $request->all();
        $customer = Customer::findOrFail($id);
        $form["address"] = json_encode($form["address"], JSON_UNESCAPED_UNICODE);
        $customer->update($form);

        return redirect('customers')
            ->with('message-success', __('site.SuccessfullyUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('customers')
            ->with('message-success', __('site.SuccessfullyUpdated'));
    }

	public function findcustomer(Request $request) {
		$phone = $request->input('phone');
		$record = Customer::where("phone",$phone)->first();
        unset($record["code"]);
        if($record){
            $record["address"] = json_decode($record["address"]);
        }

		echo json_encode($record);
	}



	public function storeCustomer(Request $request) {
        // dd($request->all());
		$id = $request->input("id");
		$data_array = array();
		$data = array(
			"name" => $request->input("name"),
			"phone" => $request->input("phone"),
			"neighborhood" => $request->input("neighborhood"),
			"address" => json_encode($request->input("address"), JSON_UNESCAPED_UNICODE),
            "activation" => 0,
            // "code" => rand(99999,10000),
			"comments" => $request->input("comments")
		);
		$data_array["message"] = "OK";
		if($id) {
			Customer::where("id" , $id)->update($data);
			$data_array["id"] = $id;
		}

		else {
			$insert_id = Customer::insertGetId($data);
			$data_array["id"] = $insert_id;
		}

		echo json_encode($data_array);
	}

    public function activationCustomer(storeCustomer $customer) {
        $isExist = Customer::where("phone",$customer["phone"])->select(["phone"])->first();
        if($isExist){
            return 1;
        }

        return 1;
    }
    public function updateMyAccount(Request $customer){
        $customer["address"] = json_encode($customer["address"], JSON_UNESCAPED_UNICODE);
        $customerId = Auth::guard("customer")->id();
        $customerDB = Customer::where("id", $customerId)->first();
        $customerDB->update($customer->all());

        return 1;
    }

    public function getAllOrders(Request $id){
        // dd($id);

        $languages  = json_decode(setting_by_key("languages") , true);
        $lang = Session::get("locale");
        if(empty(Session::get("locale"))) $lang = $languages[0];
        $sales = Sale::where('customer_id', $id->input('id'))
        ->select(
            'created_at',
            'status',
            'amount',
            'id'
        )
        ->get();

        foreach($sales as $sale){

            $sale['sale_items'] = SaleItem::where('sale_id', $sale->id)
            ->join('products', 'sale_items.product_id', '=' , 'products.id')
            ->join('products_translation', 'products.id', '=' , 'products_translation.product_id')
            ->where('products_translation.lang', $lang)
            ->select(
                'sale_items.quantity',
                'sale_items.size',
                'products.name',
                'products_translation.name as translation_name'
            )
            ->get();
        }
        // dd($sales);
        return response($sales, 200);
    }



}
