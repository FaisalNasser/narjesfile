<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Events\PosEvent;
use App\Events\UpdateOrderStatusEvent;

class ScreenController extends Controller
{
    public function customers()
    {
        $languages = json_decode(setting_by_key("languages") , true);

        $lang = Session::get("locale");

        if(empty(Session::get("locale"))) $lang =$languages[0] ;

        $completed= Sale::where('show_order', '1')->where("type", "pos")->where("status", 1)->orderBy("id", "DESC")->limit(3)->get();

        foreach( $completed as $order) {
            foreach($order->items as $pro){
                $pro->translation = DB::table("products_translation")->where("product_id" , $pro->product_id)
                ->where("lang" ,$lang)->first();
            }
        }

        $data['completed'] = $completed;

        $deliveries = Sale::whereIn("type", ["pos"])
        ->where("status", 4)
        ->where('show_order', '1')
        ->orderBy("id", "DESC")
        ->limit(10)
        ->get();
           foreach(  $deliveries as $order) { 
             foreach($order->items as $pro){
                   $pro->translation  = DB::table("products_translation")->where("product_id" , $pro->product_id)
                     ->where("lang" ,$lang)->first();
             }
        
      }
      $data['deliveries']  = $deliveries;


        $inprogress= Sale::where('show_order', '1')->where("type", "pos")->where("status", 3)->orderBy("id", "DESC")->limit(10)->get();
        foreach( $inprogress as $order) {
            foreach($order->items as $pro){
                $pro->translation = DB::table("products_translation")->where("product_id" , $pro->product_id)
                ->where("lang" ,$lang)->first();
            }
        }
        $data['inprogress'] = $inprogress;

        $data['title'] = "Orders";

        $color = [];

        $settings = Setting::where('key', 'color')->Orwhere('key', 'color_s')->where("language" , $lang)->get();

        $main_color = $settings->where('key', 'color')->last()->value;
        $scound_color = $settings->where('key', 'color_s')->last()->value;

        return view('backend.screens.customers', compact('inprogress', 'completed', 'scound_color', 'main_color', 'deliveries'));
    }
    
    public function pos()
    {
        return view('backend.screens.second_pos');
    }

    public function firePosEvent(Request $request)
    {
        broadcast(new PosEvent($request->all()));
        return;
    }

    public function kitchen()
    {
        $languages  = json_decode(setting_by_key("languages"), true);

        $lang = Session::get("locale");
        if (empty(Session::get("locale"))) $lang = $languages[0];

        $inprogress = Sale::whereIn("type", ["order", "pos"])
            ->where("status", 3)
            ->orderBy("id", "DESC")
            ->limit(20)
            ->get();
        foreach ($inprogress as $order) {
            foreach ($order->items as $pro) {
                $pro->translation  = DB::table("products_translation")->where("product_id", $pro->product_id)
                    ->where("lang", $lang)->first();
            }
        }
        $data['inprogress'] = $inprogress;

        return view('backend.screens.kitchen', $data);
    }

    public function KitshenChangeStatus(Request $request)
    {
        $sale = Sale::whereIn('id', array($request->get('id')))->update(array("status" => 4));

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

        $indelivery_count  = Sale::where('show_order', '1')->where("type", "pos")->where("status", 4)->count();
        $inprograss_count  = Sale::where('show_order', '1')->where("type", "pos")->where("status", 3)->count();

        $incomplete = Sale::where('show_order', '1')->where("type", "pos")->where("status", 3)->orderBy("id", "DESC")->limit(10)->get()->pluck('id')->map(function($order){
            $order = str_pad($order, 4, '0', STR_PAD_LEFT);
            return $order;
        });

        $deliveries = Sale::where('show_order', '1')->where("type", "pos")->where("status", 4)->orderBy("id", "DESC")->limit(10)->get()->pluck('id')->map(function($order){
            $order = str_pad($order, 4, '0', STR_PAD_LEFT);
            return $order;
        });

        $completed  = Sale::where('show_order', '1')->where("type", "pos")->where("status", 1)->orderBy("id", "DESC")->limit(3)->get()->pluck('id')->map(function($order){
            $order = str_pad($order, 4, '0', STR_PAD_LEFT);
            return $order;
        });

        $indelivery_update = Sale::where('show_order', '1')->where("type", "pos")->where("status", 4)->count();
        $inprograss_update  = Sale::where('show_order', '1')->where("type", "pos")->where("status", 3)->count();

        $play_sound = true;

        if ($indelivery_count < $indelivery_update || $inprograss_count < $inprograss_update) {
            $play_sound = true;
        }


        broadcast(new UpdateOrderStatusEvent($incomplete, $completed, $deliveries, $play_sound));

        return response()->json(['data'=>$sale]);
    }
}
