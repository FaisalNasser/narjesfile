<?php
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\User;
use App\Homepage;
use App\Category;
use App\Slider;
use App\Product;
use App\Page;
use App\Setting;

/*
 *  Get Modules
 */

function setting_by_key($key)
{

    $lang = Session::get("locale");
    if (empty(Session::get("locale")))
        $lang = "de";

    $res = Setting::where("key", $key)->where("language", $lang)->first();

    if (empty($res)) {
        $res = Setting::where("key", $key)->first();
    }

    if (empty($res)) {
        return false;
    }
    return $res->value;
}


function homepage_by_key($key)
{
    $languages = json_decode(setting_by_key("languages"), true);

    $lang = Session::get("locale");
    if (empty(Session::get("locale")))
        $lang = 'de';
    $res = Homepage::where("key", $key)->where("language", $lang)->first();
    if (empty($res)) {
        return false;
    }
    return $res->value;
}


function getSlider()
{
    $languages = json_decode(setting_by_key("languages"), true);

    $lang = Session::get("locale");
    if (empty(Session::get("locale")))
        $lang = 'ar';
    $sliders = Slider::where("language", $lang)->get();
   
    return $sliders;
}
function getCategories()
{
    $languages = json_decode(setting_by_key("languages"), true);

    $lang = Session::get("locale");
    if (empty(Session::get("locale")))
        $lang ='de';
    $categories = Category::orderBy("sort", "ASC")->where("enable", 1)->get();
    foreach ($categories as $cat) {
        $cat->translation = DB::table("categories_translation")->where("category_id", $cat->id)
            ->where("lang", $lang)->first();
    }
 
    return $categories;
}
function getProducts()
{
    $languages = json_decode(setting_by_key("languages"), true);

    $lang = Session::get("locale");
    if (empty(Session::get("locale")))
        $lang = $languages[0];
    $products = Product::orderBy("sort", "ASC")->where("enable", 1)->where("category_id", 15)->get();
    foreach ($products as $pro) {
        $pro->translation = DB::table("products_translation")->where("product_id", $pro->id)
            ->where("lang", $lang)->first();
    }
    return $products;
}
function getCategory($id)
{
    $languages = json_decode(setting_by_key("languages"), true);

    $lang = Session::get("locale");
    if (empty(Session::get("locale")))
        $lang = 'de';
    $category = Category::orderBy("sort", "ASC")->find($id);
    if (!empty($category)) {
        $category->translation = DB::table("categories_translation")->where("category_id", $category->id)
            ->where("lang", $lang)->first();
    }

    //dd($category);
    return $category;
}
function getPages()
{
    $languages = json_decode(setting_by_key("languages"), true);

    $lang = Session::get("locale");
    if (empty(Session::get("locale")))
        $lang = 'de';
    $pages = Page::orderBy("sort", "desc")->where("language", $lang)->get();

    return $pages;
}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => __('site.year'),
        'm' => __('site.month'),
        'w' => __('site.week'),
        'd' => __('site.day'),
        'h' => __('site.hour'),
        'i' => __('site.minute'),
        's' => __('site.second'),
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) {
        $string = array_slice($string, 0, 1);
    }
    return $string ? implode(', ', $string) . ' ' . __('site.ago') : __('site.just_now');
}

function listFolderFiles($dir)
{
    $editable_extensions = array('php', 'txt', 'text', 'js', 'css', 'html', 'htm', 'xml', 'inc', 'include');
    $ffs = scandir($dir);
    echo '<ol>';
    foreach ($ffs as $ff) {
        if ($ff != '.' && $ff != '..') {
            if (!is_dir($dir . '/' . $ff)) {
                if (preg_match('/\.([^.]+)$/', $ff, $matches)) {
                    $ext = strtolower($matches[1]);
                    if (in_array($ext, $editable_extensions)) {
                        echo "<li><a href='?file=" . $dir . '/' . urlencode($ff) . "'>" . $ff;
                    }
                }
            } else {
                echo "<li>" . $ff . "</li>";
            }
            if (is_dir($dir . '/' . $ff)) {
                listFolderFiles($dir . '/' . $ff);
            }
            echo '</a></li>';
        }
    }
    echo '</ol>';
}

function orientate($image, $orientation)
{
    switch ($orientation) {

        // 888888
        // 88
        // 8888
        // 88
        // 88
        case 1:
            return $image;

        // 888888
        //     88
        //   8888
        //     88
        //     88
        case 2:
            return $image->flip('h');


        //     88
        //     88
        //   8888
        //     88
        // 888888
        case 3:
            return $image->rotate(180);

        // 88
        // 88
        // 8888
        // 88
        // 888888
        case 4:
            return $image->rotate(180)->flip('h');

        // 8888888888
        // 88  88
        // 88
        case 5:
            return $image->rotate(-90)->flip('h');

        // 88
        // 88  88
        // 8888888888
        case 6:
            return $image->rotate(-90);

        //         88
        //     88  88
        // 8888888888
        case 7:
            return $image->rotate(-90)->flip('v');

        // 8888888888
        //     88  88
        //         88
        case 8:
            return $image->rotate(90);

        default:
            return $image;
    }
}



function role_permission($permission_id)
{
    $role_id = Auth::user()->role_id;
    $check = DB::table("permission_role")->where("role_id", $role_id)->where("permission_id", $permission_id)->exists();
    if ($check)
        return true;
    return false;
}