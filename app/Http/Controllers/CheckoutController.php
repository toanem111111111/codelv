<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Checkout.login_checkout')->with(compact('category','brand'));
    }

    public function add_customer(Request $request){

        $data = array();
        $data['name_customer'] = $request->name_customer;
        $data['phone_customer'] = $request->phone_customer;
        $data['email_customer'] = $request->email_customer;
        $data['password_customer'] = md5($request->password_customer);

        $id_customer = DB::table('tbl_customer')->insertGetId($data);

        Session::put('id_customer',$id_customer);
        Session::put('name_customer',$request->name_customer);
        return Redirect::to('pages.Checkout.login_checkout');

    }

    public function checkout(){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Checkout.login_checkout')->with(compact('category','brand'));
    }

}
