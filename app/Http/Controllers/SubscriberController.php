<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Subscriber;
use DB;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    
    public function index()
    {
        $subscribers =  Subscriber::all();
        
        $data['subscribers'] = $subscribers;

        return view('backend.subscribers.index', $data);
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'number' => 'required',
        ]);
        $data = $request->all();
        Subscriber::create($data);


        /*return redirect()->route('/');*/
        return redirect()->back()->with('message', 'تم الإشترك بنجاح');
    }
    
    public function show(Subscriber $subscriber)
    {
        //
    }
    
    public function edit(Subscriber $subscriber)
    {
        //
    }
    
    public function update(Request $request, Subscriber $subscriber)
    {
        
    }
    
    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect('subscribers')
            ->with('message-success', 'Subscriber deleted!');
    }
}
