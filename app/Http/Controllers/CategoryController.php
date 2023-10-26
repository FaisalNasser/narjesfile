<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Session;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $categories = Category::paginate(15);
        foreach ($categories as $cat) {
            $cat->translation = DB::table("categories_translation")->where("category_id", $cat->id)
                ->where("lang", $lang)->first();
        }
        $data = [
            'categories' => $categories,
        ];

        return view('backend.category.index', $data);
    }
    public function searchCategory(Request $request)
    {
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $request->get('searchQuery');
        $categories = DB::table("categories_translation")->where('name', 'like', '%' . $request->get('searchQuery') . '%')->where("lang", $lang)->get();
        return json_encode($categories);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $name = $form["name"];
        $category = Category::create($form);
        $translationData = array(
            "name" => $name,
            "lang" => $lang,
            "category_id" => $category->id
        );

        DB::table("categories_translation")->insert($translationData);

        $name = $category->id;
        if (file_exists("uploads/category/temp.jpg")) {
            rename("uploads/category/temp.jpg", "uploads/category/$name.jpg");
            rename("uploads/category/thumb/temp.jpg", "uploads/category/thumb/$name.jpg");
        }
        return redirect('categories')
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
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $category = Category::findOrFail($id);
        $category->translation = DB::table("categories_translation")->where("category_id", $category->id)
            ->where("lang", $lang)->first();

        return view('backend.category.show', compact('category'));
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
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $category = Category::findOrFail($id);
        $category->translation = DB::table("categories_translation")->where("category_id", $category->id)
            ->where("lang", $lang)->first();

        return view('backend.category.edit', compact('category'));
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
        $languages = json_decode(setting_by_key("languages"), true);
        $lang = Session::get("locale");
        if (empty(Session::get("locale")))
            $lang = $languages[0];
        $translationData = array(
            "name" => $form["name"],
            "lang" => $lang,
            "category_id" => $id
        );

        if (DB::table("categories_translation")->where("category_id", $id)->where("lang", $lang)->exists()) {
            DB::table("categories_translation")->where("category_id", $id)->where("lang", $lang)->update($translationData);
        } else {
            DB::table("categories_translation")->insert($translationData);
        }
        if ($lang != "en")
            unset($form["name"]);
        $customer = Category::findOrFail($id);
        $customer->update($form);

        return redirect('categories')
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
        $category_translation = DB::table("categories_translation")->where("category_id", $id)->delete();

        $customer = Category::findOrFail($id);
        $customer->delete();

        return redirect('categories')
            ->with('message-success', __('site.SuccessfullyUpdated'));
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
            $store_path = public_path("uploads/category");
            $path = $file->move($store_path, $file_name);
            $img = Image::make($store_path . "/$file_name");
            if ($img->exif('Orientation')) {
                $img = orientate($img, $img->exif('Orientation'));
            }

            $path2 = public_path("uploads/category/thumb/$file_name");
            $img->rotate($cp_v[4] * -1);
            $img->crop($cp_v[0], $cp_v[1], $cp_v[2], $cp_v[3]);
            $img->fit(265, 205)->save($path2);

            echo url("uploads/category/thumb/$file_name");
            exit;
        }

        if ($image_edit != "") {
            $path = public_path("uploads/category/$file_name");
            $img = Image::make($path);
            $path2 = public_path("uploads/category/thumb/$file_name");
            $img->rotate($cp_v[4] * -1);
            $img->crop($cp_v[0], $cp_v[1], $cp_v[2], $cp_v[3]);
            $img->fit(265, 205)->save($path2);
            echo url("uploads/category/thumb/$file_name");
            exit;
        }

    }

    public function sort(Request $request)
    {

        $categories = Category::all();

        //dd($request->sort);
        foreach ($categories as $category) {
            foreach ($request->sort as $sort) {
                //dd($sort['id'] . '  ' . $category->id);
                if ($sort['id'] == $category->id) {
                    $category->update(['sort' => $sort['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}