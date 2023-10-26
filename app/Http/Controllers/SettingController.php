<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Homepage;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Product;
use DB;
use Hamcrest\Arrays\IsArray;
use Image;
use Session;
class SettingController extends Controller
{

    public function edit()
    {
        if(!Session::has('locale')){
            session(['locale' => 'ar']);
            App::setLocale('ar');
        }



        $languages  = json_decode(setting_by_key("languages") , true);
        $lang = Session::get('locale');

        if(empty($lang)) $lang = $languages[0];

        $data['settings'] = Setting::where("language" , $lang)->get();
        // dd($data);
        return view('backend.settings.general.edit', $data);
    }

    public function update(Request $request)
    {
       $languages  = json_decode(setting_by_key("languages") , true);
        // dd($languages);

        $form = $request->except('_method', '_token' , 'logo', 'order_logo' ,'product_logo', 'languages');
        $form = collect($form);
        $lang = Session::get('locale');
        if(empty($lang)) $lang = $languages[0];

        // echo "<pre>"; print_r($form); exit;
        // dd($form);
        $form->each(
            function ($value, $key) use($lang) {
                try {
                    if(
                            // $key == "title" ||
                            $key == "phone" ||
                            $key == "email" ||
                            $key == "currency" ||
                            $key == "vat" ||
                            $key == "state" ||
                            $key == "order_whatsapp_state"
                        )
                        {
                            DB::table("settings")->where(['key' => $key])->update(["value" => $value]);
                        }
                    else{
                        $setting = Setting::where(['key' => $key])->where("language" , $lang)->first();
                        if(!empty($setting)) {
                            $setting->value = $value;
                            $setting->save();
                        } else {
                            $label_en = "";
                            $label_ar = "";
                            $setting = Setting::where(['key' => $key])->first();
                            if(!empty($setting)) {
                                $label_en =  $setting->label_en;
                                $label_ar =  $setting->label_ar;
                            }
                            $data = array(
                                "label_ar" => $label_ar,
                                "label_en" => $label_en,
                                "key" => $key,
                                "language" => $lang,
                                "value" => $value
                            );

                            Setting::insert($data);
                        }

                    }

                } catch(\Exception $e) {
                    echo $e->getMessage(); exit;
                }

            }
        );

        $languages = $request->input("languages");
        if(!empty($languages)) {
            Setting::where(['key' => "languages"])->update(["value" => json_encode($languages)]);
        }

		$file = $request->file('logo');
		$order_file = $request->file('order_logo');
		$product_logo = $request->file('product_logo');

		//$path = public_path("uploads/");
		if ($request->file('logo')) {
			$file_name = "logo1.png";
			$store_path = public_path("uploads");
            $path = $file->move($store_path, $file_name);
			//$path = $file->storeAs("uploads/", $file_name);
		}
        if ($request->file('order_logo')) {
            $file_name = "order_logo.png";
            $store_path = public_path("uploads");
            $path = $order_file->move($store_path, $file_name);
            //$path = $file->storeAs("uploads/", $file_name);
        }
        if ($request->file('product_logo')) {
            $file_name = "product_logo.png";
            $store_path = public_path("uploads");
            $path = $product_logo->move($store_path, $file_name);
            //$path = $file->storeAs("uploads/", $file_name);
        }

        return redirect('settings/general')
            ->with('message-success', __('site.SuccessfullyUpdated'));
    }

    public function homePage()
    {
        // echo Session::get('locale'); exit;
                if(empty(Session::get('locale'))) Session::put('locale', "tr");
                       $languages  = json_decode(setting_by_key("languages") , true);


        $homepage = Homepage::where("type", "!=", "")->where("language" , Session::get('locale'))->get();
        if(count($homepage) <= 0) {
            $homepage = Homepage::where("type", "!=", "")->where("language" , Session::get('locale'))->get();
        }
        $lang = Session::get('locale');
        if(empty($lang)) $lang = $languages[0];

        $categories = Category::orderBy("sort" , "ASC")->get();
         foreach ($categories as $cat) {
            $cat->translation  = DB::table("categories_translation")->where("category_id" , $cat->id)
            ->where("lang" , $lang)->first();
        }
        $products = Product::orderBy("sort" , "ASC")->get();
        foreach ($products as $pro) {
            $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)->orderBy("product_id", "DESC")->where("lang", $lang)->first();
        }

        $data = [
            'homepage' => $homepage,
            'categories' => $categories,
            'products' => $products,

        ];
        //dd($data);

        return view('backend.settings.homepage', $data);
    }

    public function homePageUpdate(Request $request)
    {
        $form = $request->except('_method', '_token', 'homePageImage1', 'homePageImage2', 'homePageImage3', 'homePageImage4' );
        $form = collect($form);



        if(empty(Session::get('locale'))) Session::put('locale', "de");
        $form->each(
            function ($value, $key) {
                $setting = Homepage::where(['key' => $key])->where("language" , Session::get('locale'))->first();
                if(!empty($setting)) {
                    if($setting->key == "category") {
                        $value = implode(",", $value);

                    }
                    $setting->value = $value;
                    $setting->save();
                } else {
                    if($key == "category") {
                        $value = implode(",", $value);
                    }
                    $data = array(
                        "key" => $key,
                        "value" => $value,
                        "language" => Session::get('locale')
                    );
                    Homepage::insert($data);

                }


            }
        );

        $file1 = $request->file('homePageImage1');
        //$path = public_path("uploads/");
        if ($file1) {
        
            $file_name = "homePageImage1.jpg";
            $store_path = public_path("uploads/homepage");
            $path = $file1->move($store_path, $file_name);
        
            // Get the full path of the saved image
            $image_path = $store_path . '/' . $file_name;
        
            // Specify the output file path for the WebP image
            $webp_path = $store_path . '/' . pathinfo($file_name, PATHINFO_FILENAME) . '.webp';
        
            // Convert the image to WebP using cwebp command-line tool
            exec("cwebp -q 80 $image_path -o $webp_path");
        
            // Optionally, you can delete the original JPEG file if it's no longer needed
             unlink($image_path); // Uncomment this line if you want to delete the original JPEG file
        }
        

        $file2 = $request->file('homePageImage2');
        //$path = public_path("uploads/");
        if ($request->file('homePageImage2')) {
            $file_name = "homePageImage2.jpg";
            $store_path = public_path("uploads/homepage");
            $path = $file2->move($store_path, $file_name);
        
            // Get the full path of the saved image
            $image_path = $store_path . '/' . $file_name;
        
            // Specify the output file path for the WebP image
            $webp_path = $store_path . '/' . pathinfo($file_name, PATHINFO_FILENAME) . '.webp';
        
            // Convert the image to WebP using cwebp command-line tool
            exec("cwebp -q 80 $image_path -o $webp_path");
        
            // Optionally, you can delete the original JPEG file if it's no longer needed
             unlink($image_path); // Uncomment this line if you want to delete the original JPEG file
        }

        $file3 = $request->file('homePageImage3');
        if ($request->file('homePageImage3')) {
            $file_name = "homePageImage3.jpg";
            $store_path = public_path("uploads/homepage");
            $path = $file3->move($store_path, $file_name);
        
            // Get the full path of the saved image
            $image_path = $store_path . '/' . $file_name;
        
            // Specify the output file path for the WebP image
            $webp_path = $store_path . '/' . pathinfo($file_name, PATHINFO_FILENAME) . '.webp';
        
            // Convert the image to WebP using cwebp command-line tool
            exec("cwebp -q 80 $image_path -o $webp_path");
        
            // Optionally, you can delete the original JPEG file if it's no longer needed
             unlink($image_path); // Uncomment this line if you want to delete the original JPEG file
        }

        $file4 = $request->file('homePageImage4');
        if ($request->file('homePageImage4')) {
            $file_name = "homePageImage4.jpg";
            $store_path = public_path("uploads/homepage");
            $path = $file4->move($store_path, $file_name);
        
            // Get the full path of the saved image
            $image_path = $store_path . '/' . $file_name;
        
            // Specify the output file path for the WebP image
            $webp_path = $store_path . '/' . pathinfo($file_name, PATHINFO_FILENAME) . '.webp';
        
            // Convert the image to WebP using cwebp command-line tool
            exec("cwebp -q 80 $image_path -o $webp_path");
        
            // Optionally, you can delete the original JPEG file if it's no longer needed
             unlink($image_path); // Uncomment this line if you want to delete the original JPEG file
        }

        return redirect('settings/homepage')
            ->with('message-success',__('site.SuccessfullyUpdated') );
    }

}
