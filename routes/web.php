<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Tiket;
use App\Models\Client;
use App\Models\Proyek;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\SalesTiketPending;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TimSaleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminSaleController;
use App\Http\Controllers\AdminTiketController;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\AdminProyekController;
use App\Http\Controllers\AdminStatusController;

use App\Http\Controllers\AdminKaryawanController;
use App\Http\Controllers\AdminEmployeeController;

use App\Http\Controllers\AdminUserController;

use App\Http\Controllers\AdminBillingController;
use App\Http\Controllers\AdminInvoiceController;

use App\Http\Controllers\AdminTahapanController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDonesaleController;
use App\Http\Controllers\DashboardPostController;

use App\Http\Controllers\TrackController;






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

Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/product', function () {
    return view('product',[
        "title" => "product",
        "active" => "product"
    ]);
});

Route::get('/contact', function () {
    return view('contact',[
        "title" => "contact",
        "active" => "contact"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Rafli Cadel",
        "email" => "rafli.cadel6@gmail.com",
    ]);
});


    Route::get('/posts', [PostController::class, 'index']);
// Halaman Single Post
Route::get('posts/{post:slug}', [PostController::class, 'show']);


Route::get('dashboard/statuses/{proyek:id}',[AdminStatusController::class, 'show']);
Route::post('dashboard/statuses/',[AdminStatusController::class, 'store']);


Route::get('categories', function(){
    return view ('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


Route::get('/categories/{category:slug}', function(Category $category){
    return view ('posts', [
        'title' => "Post by Category : $category->name",
        'active' => 'categories',
        'posts' => $category->post->load('category','author'),
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "Post by Author : $author->name",
        'active' => 'posts',
        'posts' => $author->posts->load('category','author'),
    ]);
});

Route::get('/login', [LoginController::class, 'index'] )->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'] );
Route::post('/logout', [LoginController::class, 'logout'] );
Route::get('/register', [RegisterController::class, 'index'] )->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'] );
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])
->middleware('auth');
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])
->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)
->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')
->middleware('auth');


//ROUTE LACAK TIKET
Route::get('/tracks',[TrackController::class, 'index']);
// Route::post('/tracks',[TrackController::class, 'notik']);
// Route::get('/tracks/{proyek:no_tiket_proyek}',[TrackController::class, 'getData']);


//ROUTE MENGELOLA DATA CLIENT
Route::resource('/dashboard/clients', AdminClientController::class)
->middleware('auth');

//ROUTE MENGELOLA DATA KARYAWAN
Route::group(['middleware'=>['auth', 'hakakses:super_admin,admin']], function(){
Route::resource('/dashboard/employees', AdminEmployeeController::class)->except('destroy')
->middleware('auth');
Route::post('dashboard/create/user/{employee:nik}', [AdminEmployeeController::class, 'create_user']);
Route::get('dashboard/create/user',[AdminEmployeeController::class, 'create_user']);
Route::post('dashboard/user/', [AdminEmployeeController::class, 'store_user']);
Route::post('dashboard/user/{employee:nik}', [AdminEmployeeController::class, 'store_user']);
});


//ROUTE MENGELOLA DATA USER
Route::get('dashboard/users/password',[AdminUserController::class, 'password'])->middleware('auth');
Route::post('dashboard/users/password', [AdminUserController::class, 'authenticate'] )->middleware('auth');
Route::group(['middleware'=>['auth', 'hakakses:super_admin,admin']], function(){
    Route::get('dashboard/users',[AdminUserController::class, 'index'])->middleware('auth');
    Route::post('dashboard/users/{user:id}',[AdminUserController::class, 'status']);
    Route::get('dashboard/users/{user:id}', function () { return abort(403); });
    Route::get('dashboard/users/{user:id}/edit',[AdminUserController::class, 'edit']);
    Route::put('dashboard/users/{user:id}',[AdminUserController::class, 'update']);
    Route::put('dashboard/users/{user:id}/reset',[AdminUserController::class, 'reset_password']);
});



//ROUTE MENGELOLA TIKET SALES
Route::group(['middleware'=>['auth', 'hakakses:super_admin,admin,manajer_sales']], function(){
    Route::get('dashboard/saleAcc',[AdminSaleController::class, 'acc']);
    Route::post('dashboard/sales/saleDone/{sale:id}',[AdminSaleController::class, 'donesale']);
    Route::get('dashboard/sales/saleDone/{sale:id}', function () { return abort(403); });
    Route::get('dashboard/saleLaporan',[AdminSaleController::class, 'laporan']);
    Route::get('dashboard/sales/printLaporan',[AdminSaleController::class, 'print_laporan']);
});

Route::group(['middleware'=>['auth', 'hakakses:super_admin,manajer_sales,tim_sales']], function(){
    Route::resource('/dashboard/sales', AdminSaleController::class,)->except(['show','edit']) ;
    Route::post('dashboard/sales/edit/{sale:id}', [AdminSaleController::class, 'edit']);
    Route::get('dashboard/sales/edit/{sale:id}', function () { return abort(403); });
    Route::post('dashboard/sales/{sale:id}/process',[AdminSaleController::class, 'status']);
    Route::get('dashboard/sales/{sale:id}/process', function () { return abort(403); });
    // Route::get('dashboard/sales/{sale:id}/cancle',[AdminSaleController::class, 'cancle']);
    Route::put('dashboard/sales/cancle/{sale:id}',[AdminSaleController::class, 'req_cancle']);
    Route::get('dashboard/sales/cancle/{sale:id}', function () { return abort(403); });
    Route::post('dashboard/sales/cancle/{sale:id}/acc',[AdminSaleController::class, 'acc_cancle']);
});



// Route::resource('/dashboard/proyeks', AdminProyekController::class)->except('show',)
// ->middleware('auth');

//ROUTE MENGELOLA TIKET PROYEK
Route::group(['middleware'=>['auth', 'hakakses:super_admin,manajer_proyek,tim_proyek']], function(){
    // Route::resource('/dashboard/proyeks', AdminProyekController::class,)->except(['edit', 'destroy']);
route::get('dashboard/proyeks',[AdminProyekController::class, 'index']);
Route::get('dashboard/proyeks/create',[AdminProyekController::class, 'create']);
Route::post('dashboard/proyeks',[AdminProyekController::class, 'store']);
// route::get('dashboard/proyeks/{proyek:id}',[AdminProyekController::class, 'show']);
route::get('dashboard/proyeks/{proyek:no_tiket_proyek}/update',[AdminProyekController::class, 'edit']);
// route::get('dashboard/proyeks/{proyek:id}/update', function () { return abort(403); });;

route::put('dashboard/proyeks/{proyek:id}/status', [AdminProyekController::class, 'status']);
Route::get('dashboard/proyeks/{proyek:id}/status', function () { return abort(403); });
});
// Route::get('dashboard/proyekReq',[AdminProyekController::class, 'req']);





// Route::get('dashboard/proyekReq/{proyek:id}',[AdminProyekController::class, 'create']);
// Route::post('dashboard/proyekReq',[AdminProyekController::class, 'store']);
Route::group(['middleware'=>['auth', 'hakakses:super_admin,manajer_proyek']], function(){
Route::get('dashboard/proyekAcc',[AdminProyekController::class, 'acc']);
route::get('dashboard/proyekAcc/{proyek:id}/priview',[AdminProyekController::class, 'priview']);
Route::get('dashboard/proyekDone/{proyek:id}',[AdminProyekController::class, 'donesale']);
});
//Mengelola Status Tiket Proyek
route::post('dashboard/proyeks/statuses/{status:id}/status', [AdminStatusController::class, 'status']);
route::post('dashboard/proyeks/statuses/{status:id}/statusAcc', [AdminStatusController::class, 'donests']);
route::get('dashboard/proyeks/statuses/{status:id}/statusAcc', function () { return abort(403); });
route::get('dashboard/proyeks/statuses/{status:id}/status', function () { return abort(403); });

route::put('dashboard/proyeks/statuses/{status:id}',[AdminStatusController::class, 'update']);

route::post('dashboard/proyeks/statuses/{status:id}/edit',[AdminStatusController::class, 'edit']);
route::get('dashboard/proyeks/statuses/{status:id}/edit',function () { return abort(403); });

Route::get('dashboard/proyek/statusAcc/{proyek:no_tiket_proyek}',[AdminStatusController::class, 'acc']);


Route::post('dashboard/proyekDone/{proyek:id}',[AdminProyekController::class, 'doneproyek']);
Route::get('dashboard/proyekLaporan',[AdminProyekController::class, 'laporan']);
Route::get('dashboard/proyeks/printLaporan',[AdminProyekController::class, 'print_laporan']);



//ROUTE MENGELOLA INVOICE
Route::get('dashboard/invoices',[AdminBillingController::class, 'index']);
Route::get('dashboard/invoices/{proyek:no_tiket_proyek}/detail',[AdminBillingController::class, 'detail']);
Route::get('dashboard/invoices/{proyek:no_tiket_proyek}/upload',[AdminBillingController::class, 'upload']);
Route::post('dashboard/invoices/',[AdminBillingController::class, 'store']);
// Route::get('dashboard/billings',[AdminBillingController::class, 'index']);
// Route::get('dashboard/billings/create/',[AdminBillingController::class, 'create']);
// Route::post('dashboard/billings',[AdminBillingController::class, 'store']);
// Route::get('dashboard/billings/{billing:id}/detail',[AdminBillingController::class, 'detail']);
// Route::get('dashboard/billings/invoice/{invoice:id}',[AdminBillingController::class, 'invoice']);
// Route::get('dashboard/billings/proyek/{proyek:id}',[AdminBillingController::class, 'getStatus']);
// Route::get('dashboard/billings/penyebut/{harga:harga}',[AdminBillingController::class, 'penyebut']);
// Route::get('dashboard/billings/create/auto_field/{harga:harga}',[AdminBillingController::class, 'auto_field']);



//ROUTE MENGELOLA DATA KARYAWAN
route::get('dashboard/karyawan',[AdminKaryawanController::class, 'index']);
Route::get('dashboard/karyawan/{user:id}',[AdminKaryawanController::class, 'status']);
route::get('dashboard/karyawan/create',[AdminKaryawanController::class, 'create']);
route::post('dashboard/karyawan/',[AdminKaryawanController::class, 'store']);

route::get('dashboard/karyawan/{user:id}/edit',[AdminKaryawanController::class, 'edit']);
route::post('dashboard/karyawan/update',[AdminKaryawanController::class, 'update']);




// Route::resource('/dashboard/salestikets/sales-tiket-pending', SalesTiketPendingController::class)->except('show')
// ->middleware('auth');

// Route::middleware(['auth:api'])->middleware(['second:middleware'])
//     ->prefix('yourPrefix')->group(function () {
//         Route::resource('/dashboard/tiketsales', TiketSaleController::class)->except('show');
// });


// Route::group(['middleware'=>['admin', 'sales']], function(){
//     Route::resource('/dashboard/sales', AdminTiketController::class)->except('show');
// });