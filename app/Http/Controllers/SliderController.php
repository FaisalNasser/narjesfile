<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Slider;
use Illuminate\Support\Facades\File;
use Session;
use Intervention\Image\Facades\Image;
class SliderController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
          $lang = Session::get("locale");
        if(empty(Session::get("locale"))) $lang = "ar";
        $sliders = Slider::where("language" , $lang)->get();
        return view('backend.slider.index', ['title' => "Sliders" , 'sliders' => $sliders]);
    }
     
    public function save(Request $request)
    {
        try {
            $lang = Session::get("locale");
            if (empty(Session::get("locale"))) {
                $lang = "ar";
            }
    
            $data = [
                "title" => $request->input("title"),
                "link" => $request->input("link")
            ];
    
            $destinationPath = public_path('uploads/slider/');
           
           
            if ($request->hasFile("file")) {
                $fileName = rand(11111, 999999);
                $uploadedFile = $request->file("file");
            
                if ($uploadedFile->move($destinationPath, "$fileName.jpg")) {
                    // Convert the image to WebP format using Intervention Image
                    $img = Image::make("$destinationPath/$fileName.jpg");
                    $img->encode('webp', 80)->save("$destinationPath/$fileName.webp");
    
                    // Remove the original JPEG file
                    unlink("$destinationPath/$fileName.jpg");
    
                    $data["image"] = "$fileName.webp";
                     
                    $data["language"] = $lang;
                } else {
                    return redirect()->back()->with('error', 'Error uploading file.');
                }
            }
            
            if ($request->input("id")) {
                Slider::where("id", $request->input("id"))->where("language", $lang)->update($data);
            } else {
                Slider::insert($data);
            }
    
            return redirect("sliders")->with('success', 'Slider saved successfully.');
        } catch (\Throwable $th) {
            return $th;
        }
      
    }
     
    public function get(Request $request) 
    { 
        $id = $request->input("id");
        $proeprty = Slider::where("id", $id)->first();
        echo json_encode($proeprty);
    }
    public function edit($id) 
    {
        $Slider = Slider::find($id);
        return view('backend.slider.edit', ['page' => $Slider,"title" => "Edit Page"]);
    }
     
    public function delete(Request $request) 
    { 
        $id = $request->input("id");
        $property = Slider::where("id", $id)->delete();
        echo json_encode($property);
    }
}
