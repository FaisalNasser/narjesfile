<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\UpdateProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Session;
use DB;
use Deployer\Support\Changelog\Item;
use Intervention\Image\ImageManagerStatic as Image;
use phpDocumentor\Reflection\Element;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_products()
    {
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $products = Product::get();
        foreach ($products as $pro) {
            $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)->orderBy("product_id", "DESC")->where("lang", $lang)->first();
        }

        $data = json_encode($products);
        return $products;
    }
    public function get_options($postData)
    {
        $products = Product::where("id", $postData)->first();
        $data['titles'] = [];
        $data['prices'] = [];
        if(!is_null( $products))
        {
            $data['titles'] = json_decode($products->titles);
            $data['prices'] = json_decode($products->prices);
    
        }
       
        return $data;
    }
    public function index(Request $request)
    {
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $keyword = $request->get('q', '');
        $products = Product::searchByKeyword($keyword)->orderBy("id", "DESC")->paginate(30);
        $products = !empty($keyword) ? $products->appends(['q' => $keyword]) : $products;
        foreach ($products as $pro) {
            $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)
                ->where("lang", $lang)->first();

            $pro->prices = json_decode($pro->prices);
            $pro->titles = json_decode($pro->titles);
        }

        $data = [
            'products' => $products,
            'keyword' => $keyword,
            'lang' => $lang,
        ];

        return view('backend.products.index', $data);
    }




    public function relatedproducts($id)
    {
        // return $id;
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        // $keyword = $request->get('q', '');
        // $products = Product::searchByKeyword($keyword)->orderBy("id", "DESC")->paginate(15);
        $products = Product::where('id', '!=', $id)->paginate(10);

        foreach ($products as $pro) {
            $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)->orderBy("product_id", "DESC")->where("lang", $lang)->first();

            $pro->prices = json_decode($pro->prices);
            $pro->titles = json_decode($pro->titles);
        }
        $product = Product::where('id', $id)->first();
        $product->translation = DB::table("products_translation")->where("product_id", $product->id)->orderBy("product_id", "DESC")->where("lang", $lang)->first();

        $relatedproductsid = [];
        if (!empty($product->related_products)) {
            $relatedproductsid = json_decode($product->related_products);
            
        }
        foreach ($products as $pro) {
            $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)->orderBy("product_id", "DESC")->where("lang", $lang)->first();
        }
        $data = [
            'products' => $products,
            'lang' => $lang,
            'product' => $product,
            'relatedproductsid' => $relatedproductsid,
            'productId' => $id
        ];


        return view('backend.products.relatedproducts', $data);
    }
    public function saverelatedproducts(Request $request)
    {

        $id = $request->input('productId');

        // $prices = $request->input('price');
        // Initialize an empty array to store the result
        $result = array();

        // Loop through each item in the lastprice_related_products array

        foreach ($request['lastprice_related_products'] as $item) {

            // Check if the item is checked
            if (isset($item['checked']) && $item['checked'] === 'true') {

                // If checked, add the item to the result array
                $result[] = array(
                    'id' => $item['id'],
                    'price' => isset($item['price']) ? $item['price'] : null,
                    'checked' => $item['checked']
                );
            }
        }

        // Convert the result array to JSON and output it
        $data['related_products'] = json_encode($result);

        $product = Product::findOrFail($id);
        $product->update($data);

        return redirect('products')
            ->with('message-success', __('site.SuccessfullyUpdated'));
    }
    public function searchProduct(Request $request)
    {
        $languages = json_decode(setting_by_key("languages"), true);

        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $request->get('searchQuery');
        $products = DB::table("products_translation")->where('name', 'like', '%' . $request->get('searchQuery') . '%')->where("lang", $lang)->get();

        foreach ($products as $pro) {
            $codes = Product::find($pro->product_id)->codes;
            $titles1 = json_decode($pro->titles);
            $prices1 = json_decode($pro->prices);
            $pro->titles = $titles1;
            $pro->prices = $prices1;
            $pro->codes = $codes;
            foreach ($titles1 as $key => $t) {
                $pro->titles2[$t] = ['price' => $pro->prices[$key], 'code' => $pro->codes[$key]];
            }
        }

        return json_encode($products);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $categories = Category::get();
        foreach ($categories as $cat) {
            $cat->translation = DB::table("categories_translation")->where("category_id", $cat->id)
                ->where("lang", $lang)->first();
        }
        return view('backend.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {

        $files = [];

        $form = $request->all();

        $destinationPath = "uploads/products/other";
        if ($request->file('cexpirence')) {
            $files = $request->file('cexpirence');
            foreach ($files as $key => $file) {
                $random_name = rand(11111, 999999); // renaming image
                $file_name = "pro_other_$random_name";
        
                // Move the uploaded file to the desired location with the original extension
                $file->move($destinationPath, "$file_name." . $file->getClientOriginalExtension());
        
                // Get the original file extension
                $originalExtension = strtolower($file->getClientOriginalExtension());
        
                // Convert the image to WebP format using cwebp command-line tool
                if ($originalExtension === 'jpg' || $originalExtension === 'jpeg' || $originalExtension === 'png') {
                    $webpFileName = $file_name . '.webp';
                    $webpFilePath = $destinationPath . '/' . $webpFileName;
        
                    exec("cwebp -q 80 $destinationPath/$file_name.$originalExtension -o $webpFilePath");
        
                    // Remove the original image file
                    unlink($destinationPath . '/' . $file_name . '.' . $originalExtension);
        
                    $data[$key] = $webpFileName;
                } else {
                    $data[$key] = $file_name . '.' . $originalExtension;
                }
            }
        
            $form['expirence_image'] = json_encode($data);
        }
        


        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $price = $request->input("price");
        $titles = $request->input("title");
        $form["sale_percentage_type"] =$request->input("sale_percentage_type");
        unset($form['price']);
        unset($form['title']);
        unset($form["hairType"]);
        unset($form['cexpirence']);
        unset($form['price_counter']);
        $form['prices'] = json_encode($price);
        $form['titles'] = json_encode($titles);
        $form['codes'] = json_encode($request->code);
        //    return $form;
        $product = Product::create($form);

        $name = $product->id;
        $form["product_id"] = $name;
        unset($form["_token"]);
        unset($form["hairType"]);
        unset($form["quantity"]);
        unset($form["category_id"]);
        unset($form["tax_percentage"]);
        unset($form["sale_percentage_type"]);
        unset($form["codes"]);
        unset($form["code"]);
        unset($form["expirence_image"]);
        $form["lang"] = $lang;
        DB::table("products_translation")->insert($form);
        if (file_exists("uploads/products/temp.jpg")) {
            rename("uploads/products/temp.jpg", "uploads/products/$name.jpg");
            rename("uploads/products/thumb/temp.jpg", "uploads/products/thumb/$name.jpg");
        }

        return redirect('products')
            ->with('message-success', __('site.SuccessfullyUpdated'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $product = Product::findOrFail($id);
        $categories = Category::get();
        $product->translation = DB::table("products_translation")->where("product_id", $product->id)
            ->where("lang", $lang)->first();
        foreach ($categories as $cat) {
            $cat->translation = DB::table("categories_translation")->where("category_id", $cat->id)
                ->where("lang", $lang)->first();
        }

        return view('backend.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param App\Http\Requests $request
     * @param int               $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, $id)
    {
        $files = [];
        $form = $request->all();
        // return $form;
        $destinationPath = "uploads/products/other";
        if ($request->file('cexpirence')) {
            $files = $request->file('cexpirence');
            foreach ($files as $key => $file) {
                $random_name = rand(11111, 999999); // renaming image
                $file_name = "pro_other_$random_name";
        
                // Move the uploaded file to the desired location with the original extension
                $file->move($destinationPath, "$file_name." . $file->getClientOriginalExtension());
        
                // Get the original file extension
                $originalExtension = strtolower($file->getClientOriginalExtension());
        
                // Convert the image to WebP format using cwebp command-line tool
                if ($originalExtension === 'jpg' || $originalExtension === 'jpeg' || $originalExtension === 'png') {
                    $webpFileName = $file_name . '.webp';
                    $webpFilePath = $destinationPath . '/' . $webpFileName;
        
                    exec("cwebp -q 80 $destinationPath/$file_name.$originalExtension -o $webpFilePath");
        
                    // Remove the original image file
                    unlink($destinationPath . '/' . $file_name . '.' . $originalExtension);
        
                    $data[$key] = $webpFileName;
                } else {
                    $data[$key] = $file_name . '.' . $originalExtension;
                }
            }
        
            $form['expirence_image'] = json_encode($data);
        }
        


        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];

        $price = $request->input("price");
        $titles = $request->input("title");
        unset($form['price']);
        unset($form['title']);
        unset($form['price_counter']);
        unset($form['cexpirence']);

        $form['prices'] = json_encode($price);
        $form['titles'] = json_encode($titles);
        $form['codes'] = json_encode($request->code);
        $form["sale_percentage_type"] =$request->input("sale_percentage_type");
        $productName = $form['name'];
      
        if (Session::get("locale") != "en")
            unset($form['name']);

        $product = Product::findOrFail($id);
        $product->update($form);
        $name = $product->id;
        
        $form["name"] = $productName;
        $form["product_id"] = $name;
       
        unset($form["_token"]);
        unset($form["hairType"]);
        unset($form["quantity"]);
        unset($form["category_id"]);
        unset($form["_method"]);
        unset($form["tax_percentage"]);
        unset($form["sale_percentage_type"]);
        unset($form["codes"]);
        unset($form["code"]);
        unset($form["expirence_image"]);
     
        $form["lang"] = $lang;
        if (DB::table("products_translation")->where("product_id", $id)->where("lang", $lang)->exists()) {
            DB::table("products_translation")->where("product_id", $id)->where("lang", $lang)->update($form);
        } else {
            DB::table("products_translation")->insert($form);
        }
      
        return redirect('products')
            ->with('message-success', __('site.SuccessfullyUpdated'));
    }
    public function removeProduct(Request $request)
    {
        $id = $request->input("id");
        $products_translation = DB::table("products_translation")->where("product_id", $id)->delete();

        $product = Product::findOrFail($id);
        $product->delete();
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

        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $products_translation = DB::table("products_translation")->where("product_id", $id)->delete();

        $product = DB::table("products")->where("id", $id)->delete();

        return redirect('products')
            ->with('message-success', __('site.SuccessfullyUpdated'));
    }

    public function uploadPhoto(Request $request)
    {
        $file = $request->file('croppedImage');

        if ($request->file('croppedImage')) {

            $file_name = "temp.jpg";
            $extension = $file->getClientOriginalExtension();
            $path = $file->storeAs("uploads/products/", $file_name);
            $img = Image::make($file->getRealPath());
            if ($img->exif('Orientation')) {
                $img = orientate($img, $img->exif('Orientation'));
            }

            $path2 = public_path("storage/products/$file_name");
            $img->fit(250)->save($path2);

            echo url("storage/products/" . $file_name);
        }
    }

    ////// User upload photo and resize to 145x145 to Thumb
    public function updatePhotoCrop(Request $request)
    {
        $cropped_value = $request->input("cropped_value");
        $image_edit = $request->input("image_edit");
        $cp_v = explode(",", $cropped_value);

        $file = $request->file('file');
        $file_name = $image_edit . ".jpg";
        if (empty($image_edit)) {
            $file_name = "temp.jpg";
        }

        if ($request->file('file')) {

            $extension = $file->getClientOriginalExtension();
            $store_path = public_path("uploads/products");
            $path = $file->move($store_path, $file_name);
            $img = Image::make($store_path . "/$file_name");
            if ($img->exif('Orientation')) {
                $img = orientate($img, $img->exif('Orientation'));
            }

            $path2 = public_path("uploads/products/thumb/$file_name");
            $img->rotate($cp_v[4] * -1);
            $img->crop($cp_v[0], $cp_v[1], $cp_v[2], $cp_v[3]);
            $img->fit(250)->save($path2);

            echo url("uploads/products/thumb/$file_name");
            exit;
        }

        if ($image_edit != "") {
            $path = public_path("uploads/products/$file_name");
            $img = Image::make($path);
            $path2 = public_path("uploads/products/thumb/$file_name");
            $img->rotate($cp_v[4] * -1);
            $img->crop($cp_v[0], $cp_v[1], $cp_v[2], $cp_v[3]);
            $img->fit(250)->save($path2);
            echo url("uploads/products/thumb/$file_name");
            exit;
        }
    }


    public function addToArchive(Request $request)
    {
        $id = $request->input("product_id");
        $product = Product::find($id);
        if ($product->is_delete == 1) {
            $value = 0;
        }

        if ($product->is_delete == 0) {
            $value = 1;
        }
        Product::where("id", $id)->update(array('is_delete' => $value));
    }

    // Export Exel File From Products Tabels
    public function exportProduct($lang = "ar")
    {
        return Excel::download(new ProductExport($lang), "Products.xlsx");
    }
    // Store Excel File To Database
    public function importProduct(Request $request)
    {
        $file = $request->file('import_file')->store('import');
        $import = new ProductImport;
        $import->import($file);

        $excelFailuers = $import->failures();
        if (count($excelFailuers) > 0) {
            return redirect('products')->with('excelFailuers', $excelFailuers);
        }
        return redirect('products')
            ->with('message-success', __('site.ImportSccusss'));
    }


    // Function To Check If Array Is Unique
    public function isHasDuplicates(array $array)
    {
        return count($array) > count(array_unique($array));
    }
    public function sort(Request $request)
    {

        $products = Product::all();

        //dd($request->sort);
        foreach ($products as $product) {
            foreach ($request->sort as $sort) {
                //dd($sort['id'] . '  ' . $category->id);
                if ($sort['id'] == $product->id) {
                    $product->update(['sort' => $sort['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
