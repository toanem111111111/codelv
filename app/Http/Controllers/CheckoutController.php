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

    public function order_payment(Request $request){
        //insert payment_method
//        $content = Cart::content();
//        echo $content;

        $data = array();
        $data['name_payment'] = $request->payment_option;
        $data['status_payment'] = 'Đang chờ xử lý...';
        $id_payment = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['id_customer'] = Session::get('id_customer');
        $order_data['id_shipping'] = Session::get('id_shipping');
        $order_data['id_payment'] = $id_payment;
        $order_data['total_order'] = Cart::total();
        $order_data['status_order'] = 'Đang chờ xử lý...';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $pro_content){
            $order_d_data['id_order'] = $order_id;
            $order_d_data['id_product'] = $pro_content->id;
            $order_d_data['name_product'] = $pro_content->name;
            $order_d_data['quantity'] = $pro_content->qty;
            $order_d_data['price'] = $pro_content->price;
            DB::table('tbl_detailsorder')->insert($order_d_data);

        }
        $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
        $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
        return view('pages.Notify.notify')->with(compact('category','brand'));
//        if($data['name_payment']==1){
//
//            echo 'Thanh toán thẻ ATM';
//
//        }elseif($data['name_payment']==2){
//            Cart::destroy();
//            $category=Category::orderBy('id_category','DESC')->where('status_category',1)->get();
//            $brand=Brand::orderBy('id','DESC')->where('status_brand',1)->get();
//            return view('pages.Notify.notify')->with(compact('category','brand'));
//
//        }else{
//            echo 'Thẻ ghi nợ';
//
//        }

        //return Redirect::to('/payment');
    }

}
