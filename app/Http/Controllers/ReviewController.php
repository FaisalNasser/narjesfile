<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Product;
use Auth;
use Session;
use DB;
use Intervention\Image\Facades\Image;
class ReviewController extends Controller
{
    public function AddReview(Request $request)
    {
        // $validator = Validator::make($request->all(), [
            
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //   ]);
       
        try {
            // return $request->all();
            $destinationPath = "uploads/review/";
            $image = '';
            
            if ($request->hasFile("file")) {
                $fileName = rand(11111, 999999); // renaming image
                $uploadedFile = $request->file("file");
                $uploadedFilePath = $uploadedFile->getPathname();


                if ($uploadedFile->move($destinationPath, "$fileName.jpg")) {
                    // Convert the image to WebP format using Intervention Image
                    $img = Image::make("$destinationPath/$fileName.jpg");
                    $img->encode('webp', 80)->save("$destinationPath/$fileName.webp");
    
                    // Remove the original JPEG file
                    unlink("$destinationPath/$fileName.jpg");
    
                    $image = "$fileName.webp";
                     
                    
                } else {
                    return redirect()->back()->with('error', 'Error uploading file.');
                }
            
              
            }
            $review = new Review;
            $review->name = $request->input('name');
            $review->email = $request->input('email');
            if( $review->name=='')
            {
                $review->name = 'unknown';
            }
            if( $review->email=='')
            {
                $review->email = 'unknown';
            }
            $review->message = $request->input('message');
            $review->productId = $request->input('productId');
            $review->image = $image;
    
            $review->save();
            return response(true); 
               } catch (\Throwable $th) {
                return response( $th);
        }
       
    }
    public function index(Request $request)
    {
        $languages  = json_decode(setting_by_key("languages") , true);
        $lang = Session::get("locale");
        if(empty(Session::get("locale"))) $lang = $languages[0];
        $reviews = Review::all();
        $products = Product::all();
        foreach($products as $pro) {
            $pro->translation  = DB::table("products_translation")->where("product_id" , $pro->id)
            ->where("lang" , $lang)->first();

        
        }
       // return $reviews;
        return view('backend.productReview.index',compact('reviews','products'));

    }
    public function Delete(Request $request)
    {
          
        $id = $request->input("id");
        $property = Review::where("id", $id)->delete();
        echo json_encode($property);
    }



}
