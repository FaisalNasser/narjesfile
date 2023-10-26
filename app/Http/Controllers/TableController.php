<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use App\Sale;
use App\Category;
use App\Product;
use Auth;
use Validator;
use DB;
use QrCode;
use Response;
use App\User;
class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'tables' => Table::paginate(20),
        ];

        return view('backend.tables.index', $data);
    }
    
  public function tablesOrders()
    {
        $data = [
            'tables' => Table::get(),
        ];
        //   return $data;
        return view('backend.tables.tablesOrders', $data);
    }
     public function get_tablesOrders($postData)
    {
      $tables = Table::where("status", $postData)->get();

        if($postData == -1)
        {
        $tables = Table::get();

        }
       
        return $tables;
    }
     public function create_tablesOrders($tableData)
    {
         $orders = DB::table("hold_order")->where("table_id", $tableData)->where("status", 0)->first();
      
        $debit_order = array();
        if(!empty($_GET["debit_id"])) { 
            $debit_id = $_GET["debit_id"];
            $debit_order = DB::table("debit_orders")->where("id", $debit_id)->first();
        }
     $data["debit_order"] = $debit_order;
     $data["orders"] = $orders;

       $categories = Category::get();
         foreach( $categories as $cat) { 
           $cat->translation  = DB::table("categories_translation")->where("category_id" , $cat->id)
           ->where("lang" ,"ar")->first();
       }
        $data['categories']=$categories;
        
        $products=Product::get();
         foreach( $products as $pro) { 
           $pro->translation  = DB::table("products_translation")->where("product_id" , $pro->id)
           ->where("lang" ,"ar")->first();
       }
        $data['products'] =$products;
        $data['tables'] = DB::table("tables")->get();
        $data['table_id']=$tableData;
        return view('backend.tables.create_table_order', $data);
        // return $data;
    }
     public function change_status(Request $request)
    {
         $id = $request->input("id");
        Table::where("id", $id)->update(array("status" => 2));

        return "Success";
    }
     public function set_table_empty(Request $request)
    {
         $id = $request->input("id");
         Table::where("id", $id)->update(array("status" => 0));
         $table_item = DB::table("hold_order")->where("table_id", $id);
         if($table_item!=null)
         {
             $table_item = $table_item->update(array("status" => 1));
         }
        //  DB::table("hold_order")->where("table_id", $id)->update(array("status" => 1));

        return "Success";
    }
    public function get_tableOfItem(Request $request)
    {
        $name=$request->input("name");
        // $name='عصير';
        $tables = [];
        $table_items = DB::table("hold_order")->where("status", 0)->get();
        foreach($table_items as $table_item)
        {
            $table_item->newcart = json_decode($table_item->cart);
            if(!empty($table_item->newcart))
            {
                foreach( $table_item->newcart as $cart)
        {
          if(strpos($cart->name, $name) !== false)
          {
           $tableItem = Table::where("id", $table_item->table_id)->first();
            array_push($tables, $tableItem);
          }
        }  
            }
          
        }
         
         return $tables;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
		unset($data['_token']);
		unset($data['id']);

		 if($request->input("id")) { 
            Table::where("id", $request->input("id"))->update($data);
			return redirect('tables')
            ->with('message-success', 'Table updated!');
        } else { 
            Table::insert($data);
			return redirect('tables')
            ->with('message-success', 'Table created!');
        }

        
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
        $expense = Table::findOrFail($id);

        return view('backend.tables.show', compact('expense'));
    }

     public function get(Request $request) 
    { 
        $id = $request->input("id");
        $expnese = Table::where("id", $id)->first();
        echo json_encode($expnese);
    }


    public function delete(Request $request)
    {
        $id = $request->input("id");
        $expnese = Table::where("id", $id)->delete();
        echo json_encode($expnese);
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
        $expense = Table::findOrFail($id);
        $expense->delete();

        return redirect('expenses')
            ->with('message-success', 'Table deleted!');
    }
     public function download($id) { 

        $table = Table::findOrFail($id);
         $code = QrCode::format('svg')
        ->size(100)->errorCorrection('H')
        ->generate(url('our-menu').'/' . $table->table_name);
        file_put_contents("uploads/table_$id.svg",$code);
        $file= "uploads/table_$id.svg";

        $headers = array(
            'Content-Type: application/svg',
        );
        return Response::download($file, "table_$id.svg", $headers);
    }
}
