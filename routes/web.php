<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/',function (){
    return view('pages.homeuser');
});
//Route::get('/trang-chu',[App\Http\Controllers\HomeController::class,'index']);
Route::get('/',[IndexController::class ,'home']);
Route::get('/danh-muc/{id_category}',[IndexController::class ,'show_category']);
Route::get('/thuong-hieu/{id}',[IndexController::class ,'show_brand']);
Route::get('/chi-tiet-san-pham/{id_product}',[IndexController::class ,'show_product']);


///////////////Shoppingcart
Route::post('add-cart/{id_product}',[CartController::class,'showcart']);
Route::post('/update-cart-quantity',[CartController::class,'update_cart_quantity']);
Route::get('/show-cart',[CartController::class,'show_cart']);
Route::get('/delete-to-cart/{rowId}',[CartController::class,'delete_to_cart']);
/////////////Checkout
Route::get('/login-checkout',[CheckoutController::class,'login_checkout']);
Route::get('/logout-checkout',[CheckoutController::class,'logout_checkout']);

Route::post('/add-customer',[CheckoutController::class,'add_customer']);
Route::post('/add-shipping',[CheckoutController::class,'add_shipping']);

Route::get('/payment',[CheckoutController::class,'payment']);

Route::post('/order-payment',[CheckoutController::class,'order_payment']);

Route::post('/login-customer',[CheckoutController::class,'login_customer']);
Route::get('/checkout',[CheckoutController::class,'checkout']);


/////////////Reset pass
Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');


//////backend admin
//Route::get('/admin',[App\Http\Controllers\AdminController::class,'index']);
//Route::get('/adminhome',[App\Http\Controllers\AdminController::class,'homeadmin']);
//Route::post('/adminlogin',[App\Http\Controllers\AdminController::class,'loginadmin']);
//Route::get('/adminlogout',[App\Http\Controllers\AdminController::class,'logoutadmin']);



///Danh muc san pham

Route::resource('/danhmuc',CategoryController::class);


//Route::get('/addcategory',[App\Http\Controllers\CategoryController::class,'add_category']);
//Route::get('/allcategory',[App\Http\Controllers\CategoryController::class,'all_category']);
//Route::get('/unactive-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'unactive_category']);
//Route::get('/active-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'active_category']);
//
//Route::get('/edit-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'edit_category']);
//Route::get('/delete-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'delete_category']);
//
//Route::post('/save-category',[App\Http\Controllers\CategoryController::class,'save_category']);
//Route::post('/update-category/{idcategory}',[App\Http\Controllers\CategoryController::class,'update_category']);
//Route::get('/tim-kiem',[App\Http\Controllers\CategoryController::class,'search']);


////Brand

Route::resource('/thuonghieu',BrandController::class);

///Product
Route::resource('/sanpham',ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
