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
        return Redirect::to('/checkout');
//        return view('pages.Checkout.showcheckout')->with(compact('category','brand'));

    }

    public function checkout(){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Checkout.showcheckout')->with(compact('category','brand'));
    }


    public function login_customer(Request $request){

        $email_customer = $request->email_customer;
        $password_customer = md5($request->password_customer);
        $result = DB::table('tbl_customer')->where(compact('email_customer'))
            ->where(compact('password_customer'))->first();

        if($result){
            Session::put('id_customer',$result->id_customer);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
        }

    }

    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function add_shipping(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['note'] = $request->note;
        $data['address'] = $request->address;

        $id_shipping = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('id_shipping',$id_shipping);

        return Redirect::to('/payment');

    }

    public function payment(){
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Payment.payment')->with(compact('category','brand'));

    }

}
