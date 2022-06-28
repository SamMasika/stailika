<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\PermissionController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Auth\PermissionRoleController;


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

// Route::get('/', function () {
//     return view('frontend.index');
// });
   


Route::get('/', [FrontendController::class, 'index']);
Route::get('/category', [FrontendController::class, 'category']);
Route::get('/view-category/{slug}', [FrontendController::class,'viewcategory']);
Route::get('/category/{cate_slug}/{prod_slug}', [FrontendController::class,'productview']);

Auth::routes();
Route::get('/load-cart-data', [CartController::class, 'cartcount']);
Route::get('/load-wishlist-data', [WishlistController::class, 'wishlistcount']);
Route::post('/add-to-cart', [CartController::class, 'addtocart']);
Route::post('/delete-cart-item', [CartController::class, 'deletecartitem']);
Route::post('/update-cart', [CartController::class, 'updatecart']);
Route::post('/add-to-wishlist', [WishlistController::class, 'addtowishlist']);
Route::post('/delete_wishlist', [WishlistController::class,'delete']);

//Normal user Logged in
Route::middleware(['auth'])->group(function () {

   Route::get('/cart', [CartController::class, 'viewcart']);
   Route::get('/checkout', [CheckoutController::class, 'index']);
   Route::post('/place-order', [CheckoutController::class, 'placeorder']);
   Route::get('/wishlist', [WishlistController::class, 'index']);
   Route::post('proceed-to-pay', [CheckoutController::class,'razorpaycheck']);
   
   //Shop
   Route::get('/shops', [ShopController::class, 'index']);
   Route::get('/create-shop', [ShopController::class, 'create']);
   Route::post('/store-shop', [ShopController::class, 'store']);
   Route::get('/edit-shop/{id}', [ShopController::class, 'edit']);
   Route::post('/update-shop/{id}', [ShopController::class, 'update']);
   Route::delete('/delete-shop/{id}', [ShopController::class, 'destroy'])->name('delete.shop');
   Route::get('/activate/{id}', [ShopController::class, 'activate']);
   
   // Roles
   Route::get('/rolepermission/{id}', [PermissionRoleController ::class, 'index']);
   Route::get('/roles-list', [RoleController::class, 'index']);
   Route::get('/create-role', [RoleController::class, 'create']);
   Route::post('/store-role', [RoleController::class, 'store']);
   Route::get('/edit-role/{id}', [RoleController::class, 'edit']);
   Route::post('/update-role/{id}', [RoleController::class, 'update']);
   Route::get('/delete-role/{id}', [RoleController::class, 'destroy']);
   Route::get('/createassign/{id}', [PermissionRoleController::class, 'createRolePerm']);
   Route::post('/assign/{id}', [PermissionRoleController::class, 'assignPerm']);
   Route::get('/show/{id}', [PermissionRoleController::class, 'show']);
   
//User Assignment
Route::get('/user', [UserController::class, 'index']);
Route::get('/userPerm/{id}', [UserController::class, 'UserPermView']);
Route::post('/userrole/{id}', [UserController::class, 'assignRole']);
Route::post('/user-permission/{id}', [UserController::class, 'givePermission']);
Route::get('/user-details/{id}', [UserController::class, 'userDetails']);
Route::get('/users/{id}', [UserController::class, 'destroy']);
Route::get('/my-orders', [UserController::class, 'myorders']);
Route::get('/view-order/{id}', [UserController::class, 'vieworder']);

//Permissions
Route::get('/permissions-list', [PermissionController::class, 'index']);
Route::get('/create-permission', [PermissionController::class, 'create']);
Route::post('/store-permission', [PermissionController::class, 'store']);
Route::post('/update-permission/{id}', [PermissionController::class, 'update']);
Route::get('/edit-permission/{id}', [PermissionController::class, 'edit']);
Route::get('/delete-permission/{id}', [PermissionController::class, 'destroy']);

// Route::get('/dashboard', function () {
//    return view('admin.dashboard');
// });

//Route::get('/categories', [FrontendController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/add-category', [CategoryController::class, 'create']);
Route::post('/insert-category', [CategoryController::class,'store']);
Route::get('/edit-cat/{id}', [CategoryController::class, 'edit']);
Route::post('/update-cat/{id}', [CategoryController::class, 'update']);
Route::delete('/delete-cat/{id}', [CategoryController::class, 'destroy'])->name('delete.category');
//Products Route
Route::get('/products', [ProductController::class, 'index']);
Route::get('/add-product', [ProductController::class, 'create']);
Route::post('/insert-product', [ProductController::class,'store']);
Route::get('/edit-prod/{id}', [ProductController::class, 'edit']);
Route::post('/update-prod/{id}', [ProductController::class, 'update']);
Route::delete('/delete-prod/{id}', [ProductController::class, 'destroy'])->name('delete.product');

//Orders management
Route::get('/orders', [OrderController::class,'index']);
Route::get('/view-orders/{id}', [OrderController::class,'view']);
Route::put('/update-order/{id}', [OrderController::class,'update']);
Route::get('/order-history', [OrderController::class,'history']);
Route::delete('/delete-order/{id}', [OrderController::class,'destroy'])->name('delete.orders');


//Dashbord Access
Route::get('/users', [DashboardController::class, 'users']);
Route::get('/view-user/{id}', [DashboardController::class, 'viewuser']);
Route::get('/dashboard', [DashboardController::class, 'index']);
   }); 

   //Admin Logged in

// Route::middleware(['auth','isAdmin'])->group(function () {

 
 
//  });