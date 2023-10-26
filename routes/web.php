<?php

use App\Product;
use App\SaleItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

use App\Events\UpdateDashboardStatisticsEvent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('notifications_orders', 'DashboardController@notifications')->name('notifications_orders');
Route::post('post-sortable', 'CategoryController@sort');
Route::post('post-sortable-product', 'ProductController@sort');
Route::post('post-sortable-page', 'PageController@sort');

Route::get('qr-code-with-image', function () {
    return view('qrCode');
});
Route::post('contact', 'SubscriberController@store')->name('contact.post');
Auth::routes();
Route::get('db_import', "HomeController@import");
Route::get('clear_cache', "HomeController@clearCache");

Route::group(['middlewareGroups' => 'web'], function () {
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('/', 'HomeController@index');
    Route::get('/send-email', [EmailController::class, 'index']);
    Route::get('/home/{id?}', 'HomeController@index');
    Route::get('/faq', 'HomeController@faqs');
    Route::get('/terms-condition', 'HomeController@termsCondition');
    Route::get('/formClientNormal', 'HomeController@formClientNormal')->name('formClientNormal');
    Route::get('/formClientColored', 'HomeController@formClientColored')->name('formClientColored');
    Route::post('/formClientSave', 'HomeController@formClientSave')->name('formClientSave');
    Route::get('/success-save', 'HomeController@successSave')->name('success-save');
    Route::get('/evaluate', 'HomeController@evaluate')->name('evaluate');
    Route::get('/ulogin', 'HomeController@ulogin')->name('ulogin');
    Route::get('/forgottenpasward', 'HomeController@forgottenpasward')->name('forgottenpasward');
    Route::get('/validationcode/{email}', 'HomeController@validationcode')->name('validationcode');
    Route::post('/validationcodeforresetpasward/', 'HomeController@validationcodeforresetpasward')->name('validationcodeforresetpasward');
    Route::post('/confirmcode', 'HomeController@confirmcode')->name('confirmcode');
    Route::post('/resetPassword', 'HomeController@resetPassword')->name('resetPassword'); 
    Route::get('/validationcodeforgottenpasward/{email}', 'HomeController@validationcodeforgottenpasward')->name('validationcodeforgottenpasward');
    Route::post('/resetpasswordForm', 'HomeController@resetpasswordForm')->name('resetpasswordForm');
    Route::get('/resetpassword', 'HomeController@resetpassword')->name('resetpassword');
    Route::post('/changepassword', 'HomeController@changepassword')->name('changepassword');
    Route::post('/loginuser', 'Auth\CustomerLoginController@loginuser')->name('loginuser');
    Route::get('/contactfrontend', 'HomeController@contactfrontend')->name('contactfrontend');
    Route::get('/shoppingcart/{saleId}', 'HomeController@shoppingcart')->name('shoppingcart');
    Route::get('/checkout/{saleId}', 'HomeController@checkout')->name('checkout');
    Route::get('/singleproduct/{id}/{saleId?}', 'HomeController@singleproduct')->name('singleproduct');
    Route::get('/bill', 'HomeController@bill')->name('bill');
    Route::get('/email', 'HomeController@email')->name('email');
    Route::get('/pages/{slug}', 'HomeController@pages')->name('pages');
    Route::post('/editevaluate', 'HomeController@editevaluate')->name('editevaluate');
    Route::post('/editevaluateForm', 'HomeController@editevaluateForm')->name('editevaluateForm');
    Route::get('/productDetails/{id}', 'HomeController@productDetails');
    Route::get('/userLogin', 'CustomerController@UserLogin');
    Route::post('/uLogin', 'CustomerController@ULogin');
    Route::get('/contact-us', 'HomeController@contact');
    Route::post('contact/save', 'HomeController@contactSave');
    Route::get('contactmessage', "HomeController@contactmessage");
    Route::get('/sendemailtest', 'HomeController@sendemailtest');
    Route::get('/findcustomer', 'CustomerController@findcustomer');
    Route::post('/find_customerByPhone', 'CustomerController@findCustomerByPhone');
    Route::get("email/customerEmailConfirmation", "HomeController@customerEmailConfirmation");
    Route::post("email/customerEmailOrder", "HomeController@customerEmailOrder");
    //// Email Testing
    Route::get('/testmail', 'HomeController@testMail');
    Route::get('localization/{locale}', 'LocalizationController@index');
    Route::get('products/exportProduct/{lang?}', 'ProductController@exportProduct');
    Route::post('products/importProduct', 'ProductController@importProduct');
    Route::post('product/search', 'ProductController@searchProduct');
    Route::post('category/search', 'CategoryController@searchCategory');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/statisticsRespons', 'DashboardController@statisticsRespons');
    Route::get('/admin', 'DashboardController@index');
    Route::post('reviews/addReview', 'ReviewController@AddReview');
    Route::post('sales/addOrder', 'OrderController@addOrder');
    Route::post('sales/checkoutOrder', 'OrderController@checkoutOrder');
    Route::post('sales/editOrder', 'OrderController@editOrder'); 
    Route::post('sales/addMoreItemToshoppinCart', 'OrderController@addMoreItemToshoppinCart'); 
    Route::post('sales/addMoreItemToshoppinCartForEvaluate', 'OrderController@addMoreItemToshoppinCartForEvaluate'); 
    Route::post('sales/deleteItemFromOrder', 'OrderController@deleteItemFromOrder');
    Route::post('sales/deleteAllItemFromOrder', 'OrderController@deleteAllItemFromOrder');
    Route::post('sales/addeditevaluateToCart', 'OrderController@addeditevaluateToCart');
    Route::post('sales/evaluateProducts', 'OrderController@evaluateProducts');
    Route::post('sales/completeOrderOnline', 'OrderController@completeOrderOnline');
    Route::post('wishlist/addToWishlist', 'OrderController@addToWishlist');
    Route::post('wishlist/getWishlist', 'OrderController@getWishlist');
    Route::post('wishlist', 'HomeController@getWishlistofuser');
    Route::post('newsletter/store', "NewsletterController@store");
    Route::get('newsletter/index', "NewsletterController@index");
    Route::get('newsletter/sendEmail', "NewsletterController@sendEmail");
    Route::post('sales/online_order', 'OrderController@completeSale');
    Route::post('sales/online_order_whatsapp', 'OrderController@online_order_whatsapp');
});

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::resource('categories', 'CategoryController');
        Route::resource('customers', 'CustomerController');
        Route::resource('printers', 'PrinterController');
        Route::resource('suppliers', 'SupplierController');
        Route::resource('products', 'ProductController');
        Route::post('products/removeProduct', 'ProductController@removeProduct');
        Route::resource('users', 'UserController');
        Route::resource('subscribers', 'SubscriberController');
        Route::post('product/upload_photo', 'ProductController@uploadPhoto');
        Route::get('products/relatedproducts/{id}', 'ProductController@relatedproducts');
        Route::post('products/saverelatedproducts', 'ProductController@saverelatedproducts');
        Route::post('product/upload_photo_crop', 'ProductController@updatePhotoCrop');
        Route::post('category/upload_photo_crop', 'CategoryController@updatePhotoCrop');
        Route::post('product/addToArchive', 'ProductController@addToArchive');
        Route::get('sales/receipt/{id}', 'SaleController@receipt');
        Route::get('sales/bill/{id}', 'SaleController@bill');
        Route::resource('sales', 'SaleController', ['only' => ['create', 'store']]);
        Route::get('sales/debit/{id}', 'SaleController@debit');
        Route::get('support/', 'DashboardController@support');
        Route::post('sales/complete_sale', 'SaleController@completeSale');
        Route::get('sales/', 'SaleController@index');
        Route::get('sales/cancel/{id}', 'SaleController@cancel');
        Route::get('sales/completed/{sale}', 'SaleController@complteOrder');    
        Route::get('sales/findcustomer', 'CustomerController@findcustomer');
        Route::post('sales/store_customer', 'CustomerController@storeCustomer');
        Route::post('sales/confirm_costumer', 'CustomerController@confirmCostumer');
        Route::post('sale/hold_order', 'SaleController@holdOrder');
        Route::post('sale/debit_order', 'SaleController@debitOrder');
        Route::post('sale/debit_orders', 'SaleController@debitOrders');
        Route::post('sale/hold_orders', 'SaleController@holdOrders');
        Route::post('sale/view_hold_order', 'SaleController@viewHoldOrder');
        Route::post('sale/hold_order_remove', 'SaleController@removeHoldOrder');
        Route::post('sale/debit_order_remove/', 'SaleController@removeDebitOrder');
        Route::get('sales/deleteDebitOrder/{id}', 'SaleController@deleteDebitOrder');
        Route::get('sales/edit/{id}', 'SaleController@edit');
        Route::get('sales/editordersExcel/{id}', 'SaleController@editordersExcel');
        Route::get('sales/confirmdebitorder/{id}', 'SaleController@confirmdebitorder');
        Route::get('sales/view/{id}', 'SaleController@view');
        Route::post('sales/update', 'SaleController@update');
        Route::get('product/get_products', 'ProductController@get_products');
        Route::get('product/get_options/{postData}', 'ProductController@get_options');
        Route::post('sales/saveitem', 'SaleController@saveitem');
        Route::post('/sales/deleteitem', 'SaleController@deleteitem');
        Route::post('sales/changeOrderStatus', 'SaleController@changeOrderStatus');
        Route::get('reports/daily', 'ReportController@daily');
        Route::get('reports/sales_by_products', 'ReportController@SalesByProduct');
        Route::get('reports/graphs', 'ReportController@Graphs');
        Route::get('reports/expenses', 'ReportController@expenses');
        Route::get('reports/expensesales', 'ReportController@expenseSales');
        Route::get('reports/staff_sold', 'ReportController@staffSold');
        Route::get('reports/staff_log', 'ReportController@staffLogs');
        Route::get('reports/staff_log/{id}', 'ReportController@staffLogs');
        Route::get('reports/{type}', 'ReportController@index');
        Route::get('reports/{type}/{id}', 'ReportController@show');
        /// Pages Controller
        Route::get('/pages', 'PageController@index');
        Route::post('/pages/save', 'PageController@save');
        Route::get('/pages/add', 'PageController@add');
        Route::get('/pages/delete/{id}', 'PageController@delete');
        Route::get('/pages/edit/{id}', 'PageController@edit');
        //// Slider
        Route::get("/sliders", 'SliderController@index');
        Route::post("slider/save", 'SliderController@save');
        Route::post("slider/get", 'SliderController@get');
        Route::post("slider/delete", 'SliderController@delete');
        Route::get("/slider/edit/{id}", 'SliderController@edit');
        ////   review
        Route::post("review/delete", 'ReviewController@delete');
        Route::get("reviews", 'ReviewController@index');
        //// expenses
        Route::get("/expenses", 'ExpenseController@index');
        Route::post("expenses/save", 'ExpenseController@store');
        Route::post("expenses/get", 'ExpenseController@get');
        Route::post("expenses/delete", 'ExpenseController@delete');
        //// Tables
        Route::get("/tables", 'TableController@index');
        Route::get("/tables_orders", 'TableController@tablesOrders');
        Route::get('tables/get_tablesOrders/{postData}', 'TableController@get_tablesOrders');
        Route::get('tables_orders/create_Orders/{tableData}', 'TableController@create_tablesOrders');
        Route::post('tables/get_tableOfItem', 'TableController@get_tableOfItem');
        Route::post('tables/change_status', 'TableController@change_status');
        Route::post('tables/set_table_empty', 'TableController@set_table_empty');
        Route::post("tables/save", 'TableController@store');
        Route::post("tables/get", 'TableController@get');
        Route::post("tables/delete", 'TableController@delete');
        Route::post("tables/download/{id}", 'TableController@download');

        // Editor
        Route::get('editor/html', 'EditorController@siteHtml');
        Route::post('html/save', 'EditorController@saveHtml');

        /// Orders
        Route::get("online-orders", "OrderController@index");
        Route::get("orders", "OrderController@orders");
        Route::get("ordersExcelNormalcustomers", "OrderController@ordersExcelNormalcustomers");
        Route::get("ordersExcelColoredcustomers", "OrderController@ordersExcelColoredcustomers");
        Route::get("debit_orders", "OrderController@debitOrders");
        Route::post("orders/save", "OrderController@ChangeStatus");
        Route::get('/roles', 'RoleController@index');
        Route::get("/roles/edit/{id}", "RoleController@edit");
        Route::post("/roles/update", "RoleController@update");

        //// Emails for Reports
        Route::get("email/staff_sold", "EmailController@index");
        Route::get("email/daily_sales", "EmailController@DailySales");


        Route::group(
            ['prefix' => 'settings'],
            function () {
                    Route::get('homepage', 'SettingController@homePage');
                    Route::post('homepage', 'SettingController@homePageUpdate');
                    Route::get('profile', 'ProfileController@edit');
                    Route::post('profile', 'ProfileController@update');
                    Route::get('general', 'SettingController@edit');
                    Route::post('general', 'SettingController@update');
                    Route::post('update_password', 'ProfileController@updatePassword');
                    Route::resource('roles', 'RoleController');
                    Route::resource('permissions', 'PermissionController');
                }
        );
    }
);

Route::get('/resetcodes', function () {
    $items = SaleItem::where('codes', null)->get();
    foreach ($items as $item) {
        $product = Product::find($item->product_id);

        if (!$product) {
            continue;
        }
        //
        foreach ($product->titles as $key => $value) {
            if ($value == $item->size && $product->prices[$key] == $item->price) {
                $item->update([
                    'codes' => $product->codes[$key],
                ]);
            }
        }

    }
});

// Customer
Route::post('customer/LoginSMS', "TwilioSMSController@customerLoginSMS");
Route::POST('customer/customerOrderSMS', "TwilioSMSController@customerOrderSMS");
Route::POST('customer/resendCodeSMS', "TwilioSMSController@resendCodeSMS");
Route::post('customer/update', "CustomerController@updateMyAccount")->middleware("auth.customer");
Route::get('customer/getAllOrders/{id}', "CustomerController@getAllOrders")->middleware("auth.customer");
Route::get('verfiAccount', "TwilioSMSController@verfiAccount");
Route::post('customer/activationCustomer', 'CustomerController@activationCustomer');
Route::post('customer/login', 'Auth\CustomerLoginController@login');
Route::group(['middlewareGroups' => 'customer'], function () {
    Route::get('/customer/logout', [\App\Http\Controllers\Auth\CustomerLoginController::class, 'logout']);
});

// Route To Set Cookies That Use In Dashboard
Route::get('dashboard/setCookies', 'CookiesController@setCookies');
