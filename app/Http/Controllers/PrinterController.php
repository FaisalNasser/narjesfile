<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\Category;
use App\Models\PrinterUser;
use App\User;

class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = [
            'printers' => DB::table("printers")->orderBy("id","desc")->paginate(),
        ];

        return view('backend.printers.index', $data);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $languages  = json_decode(setting_by_key("languages") , true);
        $lang = Session::get("locale");
        if(empty(Session::get("locale"))) $lang = $languages[0]; 
        $categories = Category::all();
        $users = User::all();
        foreach($categories as $cat) { 
            $cat->translation  = DB::table("categories_translation")->where("category_id" , $cat->id)
            ->where("lang" , $lang)->first();
        }
        $data = [
            'categories' => $categories,
            'users' => $users
        ];
        return view('backend.printers.create', $data);
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
        $form = $request->all();
         DB::table('printers')->insert(
           ['name' => $request->input("name"),
            'destination' => $request->input("destination"),
             'category_id' => json_encode($request->input("category_id")),
          ]
              );

         $printer = DB::table('printers')->select('id')->latest('id')->first();

         foreach ($request->users as $user) {
             PrinterUser::create([
                'user_id' => $user,
                'printer_id' => $printer->id,
             ]);
         }


        return redirect('printers')
            ->with('message-success', __('site.SuccessfullyUpdated'));
        //return $form;
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
        $printer = DB::table("printers")->find($id);

        return view('backend.printers.show', compact('printer'));
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
        $data = [];
          $languages  = json_decode(setting_by_key("languages") , true);
        $lang = Session::get("locale");
        if(empty(Session::get("locale"))) $lang = $languages[0]; 
        $categories = Category::all();
        $users = User::all();
        foreach($categories as $cat) { 
            $cat->translation  = DB::table("categories_translation")->where("category_id" , $cat->id)
            ->where("lang" , $lang)->first();
        }
       
        
        $printer = DB::table("printers")->find($id);
        $printer_users = DB::table("printers")->join('printer_users', 'printers.id', '=', 'printer_users.printer_id')->pluck('user_id')->toArray();
        $data = [
            'printer' => $printer,
        ];
         
   
        return view('backend.printers.edit', compact('printer','categories', 'users', 'printer_users'));
       // return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests $request
     * @param int               $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form = $request->all();
 
        $printer= DB::table("printers")->where('id',$id);
        $printer->update( ['name' => $request->input("name"),
            'destination' => $request->input("destination"),
            'category_id' => $request->input("category_id"),
          ]);

        $printer_users = PrinterUser::where('printer_id', $id)->delete();

        foreach ($request->users as $user) {
             PrinterUser::create([
                'user_id' => $user,
                'printer_id' => $id,
             ]);
         }

        return redirect('printers')
            ->with('message-success',__('site.SuccessfullyUpdated'));
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
        $printer = DB::table("printers")->where('id',$id);
        $printer->delete();

        return redirect('printers')
            ->with('message-success', __('site.SuccessfullyUpdated'));
    }
	

}
